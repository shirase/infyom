<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Page\PageType;

class PageController extends Controller
{
    public function show($slug, PageType $pageType)
    {
        $model = Page::query()->slug($slug)->active()->first();
        if (empty($model)) {
            return abort(404);
        }

        if ($model->type) {
            return abort(500);
        }

        return view('page.show')->with(compact('model'));
    }
}
