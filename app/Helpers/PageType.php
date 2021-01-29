<?php

namespace App\Helpers;

use App\Http\Controllers\ArticleController;

class PageType
{
    const TYPE_ARTICLE_INDEX = 'article_index';
    const TYPE_ARTICLE_CATEGORY = 'article_category';

    protected static $types = [
        self::TYPE_ARTICLE_INDEX => [
            'action' => [ArticleController::class, 'index'],
            'title' => 'Список статей',
            'submenu' => [ArticleController::class, 'nav'],
        ],
        self::TYPE_ARTICLE_CATEGORY => [
            'action' => [ArticleController::class, 'categories'],
            'title' => 'Категории статей',
        ],
    ];

    public static function actionByType($type)
    {
        $config = static::$types[$type];
        return $config['action'] ?? null;
    }

    public static function getTypes()
    {
        $types = [];
        foreach (self::$types as $key => $item) {
            $types[$key] = __($item['title']);
        }
        return $types;
    }

    public static function getSubmenu($type)
    {
        $config = static::$types[$type];
        return $config['submenu'] ?? null;
    }
}

