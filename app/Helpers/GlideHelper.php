<?php

namespace App\Helpers;

use Illuminate\Filesystem\FilesystemAdapter;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;

class GlideHelper
{
    public static function createPublicUrl($path, $params)
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

        return url($server->getCachePath($path, $params) . '?' . http_build_query($params));
    }

    public static function createStorageUrl($path, $params)
    {
        /** @var FilesystemAdapter $disk */
        $disk = app('filesystem')->disk('local');

        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory(app('request')),
            'source' => $disk->getDriver(),
            'cache' => $disk->getDriver(),
            'cache_path_prefix' => '.cache',
            'base_url' => 'glide',
            'cache_with_file_extensions' => false,
        ]);

        return url('glide/' . $path . '?' . http_build_query($params));
    }
}
