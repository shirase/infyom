<?php

namespace App\Page;

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Collection;

class PageType
{
    const TYPE_ARTICLE_INDEX = 'article_index';
    const TYPE_ARTICLE_CATEGORY = 'article_category';

    protected static $types = [
        self::TYPE_ARTICLE_INDEX => [
            'action' => [ArticleController::class, 'index'],
            'title' => 'Список статей',
        ],
        self::TYPE_ARTICLE_CATEGORY => [
            'action' => [ArticleController::class, 'categories'],
            'title' => 'Категории статей',
        ],
    ];

    public function actionByType($type)
    {
        $config = static::$types[$type];
        return $config['action'];
    }

    public function getTypes()
    {
        $types = [];
        foreach (self::$types as $key => $item) {
            $types[$key] = __($item['title']);
        }
        return $types;
    }
}

