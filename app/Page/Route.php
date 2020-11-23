<?php

namespace App\Page;

use App\Models\Page;
use Illuminate\Http\Request;

class Route extends \Illuminate\Routing\Route
{
    /** @var Page */
    private $pageModel;

    public function matches(Request $request, $includingMethod = true)
    {
        $path = rawurldecode(trim($request->getPathInfo(), '/') ?: '/');
        $this->pageModel = Page::query()->where('slug', $path)->active()->first();
        return (bool)$this->pageModel;
    }

    protected function parseControllerCallback()
    {
        if ($this->pageModel && $this->pageModel->type) {
            $pageType = app(PageType::class);
            return $pageType->actionByType($this->pageModel->type);
        }

        return parent::parseControllerCallback();
    }
}
