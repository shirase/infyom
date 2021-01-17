<?php

namespace App\Repositories;

use App\Builders\PageBuilder;
use App\Models\Page;

/**
 * Class PageRepository
 *
 * @method PageBuilder allQuery($search = [], $skip = null, $limit = null)
 *
 * @package App\Repositories
 * @version November 10, 2020, 12:34 pm UTC
*/

class PageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'parent_id',
        'title',
        'slug',
        'status',
        'body'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Page::class;
    }

    /**
     * @return array
     */
    public function buildNav()
    {
        $level0 = $this->allQuery()
            ->publish()
            ->where('parent_id', null)
            ->orderBy(\Kalnoy\Nestedset\NestedSet::LFT)
            ->get()
        ;

        if (!$level0)
            return [];

        $level1 = $this->allQuery()
            ->publish()
            ->whereIn('parent_id', $level0->pluck('id'))
            ->orderBy(\Kalnoy\Nestedset\NestedSet::LFT)
            ->get()
            ->groupBy('parent_id')
        ;

        $menu = [];

        foreach ($level0 as $page) {
            $menu[] = [
                'item' => $page,
                'items' => $level1->get($page->id) ?? null,
            ];
        }

        return $menu;
    }
}
