<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Page;

class ArticleController extends Controller
{
    public function index($slug)
    {
        $category = Page::query()->slug($slug)->active()->first();
        if (empty($category)) {
            return abort(404);
        }

        return view('article.index')->with(compact('category'));
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
