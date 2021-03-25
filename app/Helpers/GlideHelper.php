<?php

namespace App\Helpers;

use Illuminate\Filesystem\FilesystemAdapter;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;

class GlideHelper
{
    public static function createSignedUrl($path, $params)
    {
        /** @var FilesystemAdapter $disk */
        $disk = app('filesystem')->disk('public');

        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory(app('request')),
            'source' => $disk->getDriver(),
            'cache' => $disk->getDriver(),
            'cache_path_prefix' => 'storage/cache',
            'base_url' => 'storage/cache',
            'cache_with_file_extensions' => true,
        ]);

        return $server->getCachePath($path, $params) . '?' . http_build_query($params);
    }
}
