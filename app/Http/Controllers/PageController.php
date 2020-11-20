<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
    public function show($slug)
    {
        $model = Page::query()->slug($slug)->active()->first();
        if (empty($model)) {
            return abort(404);
        }

        return view('page.show')->with(compact('model'));
    }
}
