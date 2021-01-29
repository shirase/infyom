<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Page;
use App\Repositories\ArticleCategoryRepository;
use App\Repositories\ArticleRepository;
use Illuminate\Routing\Contracts\ControllerDispatcher as ControllerDispatcherContract;
use Illuminate\Http\Request;
use Kalnoy\Nestedset\NestedSet;

class ArticleController extends Controller
{
    public function index($slug, ArticleRepository $articleRepository, ArticleCategoryRepository $articleCategoryRepository)
    {
        $category = ArticleCategory::query()->slug($slug)->active()->first();

        $page = Page::query()->slug($slug)->active()->first();

        if (empty($page) && empty($category)) {
            return abort(404);
        }

        $query = $articleRepository->allQuery()->active();

        if ($category) {
            $query->category($category->id);
        }

        $models = $query->paginate(20);

        return view('article.index')->with(compact('page', 'category', 'models'));
    }

    public function categories($slug, ArticleCategoryRepository $repository)
    {
        $page = Page::query()->slug($slug)->active()->first();
        if (empty($page)) {
            return abort(404);
        }

        $models = $repository->allQuery()->active()->paginate(20);

        return view('article.categories')->with(compact('page', 'models'));
    }

    public function show(Request $request, ControllerDispatcherContract $controllerDispatcher, $slug1, $slug2 = null)
    {
        if ($slug2) {
            list($category_slug, $slug) = [$slug1, $slug2];
        } else {
            $slug = $slug1;
        }

        if (isset($category_slug)) {
            $category = ArticleCategory::query()->slug($category_slug)->active()->first();
        } else {
            $category = ArticleCategory::query()->slug($slug)->active()->first();
            if ($category) {
                return $controllerDispatcher->dispatch($request->route(), $this, 'index');
            }
        }

        $model = Article::query()->slug($slug)->active()->first();
        if (empty($model)) {
            return abort(404);
        }

        return view('article.show')->with(compact('model', 'category'));
    }

    public static function nav($pageId)
    {
        $items = ArticleCategory::query()->get()->map(function (ArticleCategory $model) {
            return [
                'label' => $model->title,
                'url' => route('article.index', ['category' => $model->slug]),
                'active' => \Request::routeIs('article.index') && \Request::route('category') == $model->slug,
            ];
        });

        if (!$items->count()) {
            return null;
        }

        /** @var Page $page */
        $page = Page::query()->find($pageId);
        if ($page) {
            $items->prepend([
                'label' => __('Все статьи'),
                'url' => url($page->slug),
                'active' => \Request::is($page->slug),
            ]);
        }

        return $items;
    }
}
