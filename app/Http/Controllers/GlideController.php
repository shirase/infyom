<?php

namespace App\Http\Controllers;

use Illuminate\Filesystem\FilesystemAdapter;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;

class GlideController extends Controller
{
    public function show($path)
    {
        /** @var FilesystemAdapter $disk */
        $disk = app('filesystem')->disk('public');

        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory(app('request')),
            'source' => $disk->getDriver(),
            'cache' => $disk->getDriver(),
            'cache_path_prefix' => 'cache',
            //'base_url' => 'glide',
            'base_url' => 'storage/cache',
            'cache_with_file_extensions' => true,
        ]);

        return $server->getImageResponse($path, request()->all());
    }
}
