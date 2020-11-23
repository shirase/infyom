<?php

namespace App\Page;

use App\Http\Controllers\ArticleController;

class PageType
{
    protected static $types = [
        'article_index' => [
            'action' => [ArticleController::class, 'index'],
        ],
        'article_category' => [
            'action' => [ArticleController::class, 'categories'],
        ],
    ];

    public function actionByType($type)
    {
        $config = static::$types[$type];
        return $config['action'];
    }
}

