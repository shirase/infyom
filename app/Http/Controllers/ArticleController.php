<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Page;

class ArticleController extends Controller
{
    public function index($category_id)
    {
        $category = Page::query()->where('id', $category_id)->active()->first();
        if (empty($category)) {
            return abort(404);
        }

        return view('article.index')->with(compact('category'));
    }

    public function categories()
    {
        return view('article.categories');
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
