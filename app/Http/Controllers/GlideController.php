<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Filesystem\FilesystemManager;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;

class GlideController extends Controller
{
    public function show(Container $app, $path)
    {
        /** @var FilesystemManager $filesystem */
        $filesystem = $app['filesystem'];
        /** @var FilesystemAdapter $disk */
        $disk = $filesystem->disk('local');

        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory(app('request')),
            'source' => $disk->getDriver(),
            'cache' => $disk->getDriver(),
            'cache_path_prefix' => '.cache',
            'base_url' => 'glide',
        ]);

        return $server->getImageResponse($path, request()->all());
    }
}
