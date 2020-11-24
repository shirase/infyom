<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Helpers\PageType;
use Illuminate\Routing\Contracts\ControllerDispatcher as ControllerDispatcherContract;

class PageController extends Controller
{
    public function show($slug)
    {
        $model = Page::query()->slug($slug)->active()->first();
        if (empty($model)) {
            return abort(404);
        }

        if ($model->type) {
            $action = PageType::actionByType($model->type);
            if ($action) {
                return app(ControllerDispatcherContract::class)->dispatch(\Route::current(), app($action[0]), $action[1]);
            }
        }

        return view('page.show')->with(compact('model'));
    }
}
