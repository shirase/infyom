<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class BreadcrumbsComposer
{
    public function compose(View $view)
    {
        $view->with('breadcrumbs', self::$breadcrumbs);
    }

    private static $breadcrumbs = [];

    public static function setBreadcrumbs($value)
    {
        self::$breadcrumbs = $value;
    }
}
