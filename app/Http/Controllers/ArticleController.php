<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Page;
use App\Repositories\ArticleRepository;

class ArticleController extends Controller
{
    public function index($slug, ArticleRepository $repository)
    {
        $category = Page::query()->slug($slug)->active()->first();
        if (empty($category)) {
            return abort(404);
        }

        $models = $repository->allQuery()->active()->paginate(20);

        return view('article.index')->with(compact('category', 'models'));
    }

    public function categories($slug)
    {
        $category = Page::query()->slug($slug)->active()->first();
        if (empty($category)) {
            return abort(404);
        }

        return view('article.categories')->with(compact('category'));
    }

    public function show($slug)
    {
        $model = Article::query()->slug($slug)->active()->first();
        if (empty($model)) {
            return abort(404);
        }

        return view('article.show')->with(compact('model'));
    }
}
