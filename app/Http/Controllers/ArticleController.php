<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Page;
use App\Repositories\ArticleCategoryRepository;
use App\Repositories\ArticleRepository;
use Illuminate\Routing\Contracts\ControllerDispatcher as ControllerDispatcherContract;
use Illuminate\Routing\Route;

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
        $category = Page::query()->slug($slug)->active()->first();
        if (empty($category)) {
            return abort(404);
        }

        $models = $repository->allQuery()->active()->paginate(20);

        return view('article.categories')->with(compact('category', 'models'));
    }

    public function show($slug)
    {
        $category = ArticleCategory::query()->slug($slug)->active()->first();
        if ($category) {
            return app(ControllerDispatcherContract::class)->dispatch(\Route::current(), $this, 'index');
        }

        $model = Article::query()->slug($slug)->active()->first();
        if (empty($model)) {
            return abort(404);
        }

        return view('article.show')->with(compact('model'));
    }
}
