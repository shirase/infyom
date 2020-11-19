<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class ModelHelper
{
    public static function modelAttributeLabels($modelClass)
    {
        /** @var \Illuminate\Contracts\Translation\Loader|\Illuminate\Translation\FileLoader $translationLoader */
        $translationLoader = app('translation.loader');
        $fields = $translationLoader->load(app()->getLocale(), 'fields');
        return $fields[Str::snake(class_basename($modelClass))] ?? [];
    }
}
