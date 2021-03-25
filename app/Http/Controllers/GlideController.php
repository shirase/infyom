<?php

namespace App\Http\Controllers;

use App\Helpers\GlideHelper;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Http\Request;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;
use League\Glide\Signatures\SignatureFactory;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class GlideController extends Controller
{
    public function web($path, Request $request)
    {
        /** @var FilesystemAdapter $disk */
        $disk = app('filesystem')->disk('public');

        $signature = SignatureFactory::create(GlideHelper::$signKey);
        $signature->validateRequest($path, $request->all());

        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory(app('request')),
            'source' => $disk->getDriver(),
            'cache' => $disk->getDriver(),
            'cache_path_prefix' => 'cache',
            'base_url' => 'storage/cache',
            'cache_with_file_extensions' => true,
        ]);

        return $server->getImageResponse($path, request()->all());
    }

    public function storage($path, Request $request)
    {
        /** @var FilesystemAdapter $disk */
        $disk = app('filesystem')->disk('local');

        $signature = SignatureFactory::create(GlideHelper::$signKey);
        $signature->validateRequest($path, $request->all());

        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory(app('request')),
            'source' => $disk->getDriver(),
            'cache' => $disk->getDriver(),
            'cache_path_prefix' => '.cache',
            'base_url' => 'glide',
            'cache_with_file_extensions' => false,
        ]);

        return $server->getImageResponse($path, request()->all());
    }
}
