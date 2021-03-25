<?php

namespace App\Helpers;

use Illuminate\Filesystem\FilesystemAdapter;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;
use League\Glide\Signatures\SignatureFactory;

class GlideHelper
{
    public static $signKey = 'c695379d69bd57873d16601b18486905';

    public static function createPublicUrl($path, $params)
    {
        /** @var FilesystemAdapter $disk */
        $disk = app('filesystem')->disk('public');

        $signature = SignatureFactory::create(self::$signKey);

        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory(app('request')),
            'source' => $disk->getDriver(),
            'cache' => $disk->getDriver(),
            'cache_path_prefix' => 'storage/cache',
            'base_url' => 'storage/cache',
            'cache_with_file_extensions' => true,
        ]);

        return url($server->getCachePath($path, $params) . '?' . http_build_query($signature->addSignature($path, $params)));
    }

    public static function createStorageUrl($path, $params)
    {
        $signature = SignatureFactory::create(self::$signKey);

        return url('glide/' . $path . '?' . http_build_query($signature->addSignature($path, $params)));
    }
}
