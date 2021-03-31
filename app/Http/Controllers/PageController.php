<?php

namespace App\Http\Controllers;

use App\Helpers\NavHelper;
use App\Models\Page;
use App\Helpers\PageType;
use App\Repositories\PageRepository;
use Illuminate\Container\Container;
use Illuminate\Routing\Contracts\ControllerDispatcher as ControllerDispatcherContract;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($slug, Request $request, ControllerDispatcherContract $controllerDispatcher, Container $container)
    {
        $model = Page::query()->slug($slug)->active()->first();
        if (empty($model)) {
            return abort(404);
        }

        NavHelper::buildBreadcrumbs($model);

        if ($model->type) {
            $action = PageType::actionByType($model->type);
            if ($action) {
                return $controllerDispatcher->dispatch($request->route(), $container->make($action[0]), $action[1]);
            }
        }

        return view('page.show')->with(compact('model'));
    }

    public function store($id, Request $request, PageRepository $pageRepository)
    {
        $pageRepository->update($request->all(), $id);
        return __('Saved');
    }
}
