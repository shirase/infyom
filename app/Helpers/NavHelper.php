<?php

namespace App\Helpers;

use App\Http\View\Composers\BreadcrumbsComposer;
use App\Models\Page;
use Illuminate\Support\Collection;
use Kalnoy\Nestedset\NodeTrait;

class NavHelper
{
    public static function buildNav()
    {
        $level0 = Page::query()
            ->publish()
            ->where('parent_id', null)
            ->orderBy(\Kalnoy\Nestedset\NestedSet::LFT)
            ->get()
        ;

        if (!$level0)
            return [];

        /** @var Collection $level1 */
        $level1 = Page::query()
            ->publish()
            ->whereIn('parent_id', $level0->pluck('id'))
            ->orderBy(\Kalnoy\Nestedset\NestedSet::LFT)
            ->get()
            ->groupBy('parent_id')
        ;

        $nav = [];

        foreach ($level0 as $page) {
            $items = null;

            if ($page->type) {
                $submenuFn = PageType::getSubmenu($page->type);
                if ($submenuFn) {
                    $items = call_user_func($submenuFn, $page->id);
                }
            }

            if (!$items) {
                /** @var \Illuminate\Database\Eloquent\Collection $items */
                $items = $level1->get($page->id);
                if ($items) {
                    $items = $items->map(function(Page $model) {
                        return [
                            'label' => $model->title,
                            'url' => url($model->slug),
                            'active' => \Request::is($model->slug, $model->slug . '/*'),
                        ];
                    });
                }
            }

            $nav[] = [
                'label' => $page->title,
                'url' => url($page->slug),
                'active' => \Request::is($page->slug, $page->slug . '/*')
                    || ($items && $items->contains(function($nav) {return !!$nav['active'];})),
                'icon' => null,
                'options' => null,
                'items' => $items,
            ];
        }

        return $nav;
    }

    /**
     * @param Page $model
     */
    public static function buildBreadcrumbs($model)
    {
        if (!$model)
            return null;

        $breadcrumbs = [
            ['label' => $model->title]
        ];
        while ($parentId = $model->getParentId()) {
            /** @var Page $model */
            $model = $model->newQuery()->find($parentId);
            if (!$model)
                break;
            array_unshift($breadcrumbs, [
                'label' => $model->title,
                'url' => url($model->slug),
            ]);
        }

        BreadcrumbsComposer::setBreadcrumbs($breadcrumbs);
    }
}
