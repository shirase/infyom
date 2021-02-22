<?php

namespace App\Services;

class KCFinderService
{
    public function __construct()
    {
        if (!\Auth::check())
            return false;

        if (!session_id())
            session_start();

        $_SESSION['KCFINDER'] = [
            'uploadURL' => asset('storage/media'),
            'uploadDir' => \Storage::path('public/media'),
            'disabled' => false,
            'denyZipDownload' => true,
            'denyUpdateCheck' => true,
            'denyExtensionRename' => true,
            'theme' => 'default',
            'access' => [
                'files' => [
                    'upload' => true,
                    'delete' => false,
                    'copy' => false,
                    'move' => false,
                    'rename' => false,
                ],
                'dirs' => [
                    'create' => true,
                    'delete' => false,
                    'rename' => false,
                ],
            ],
            'imageDriversPriority' => 'gd',
            'types' => [
                'files' => [
                    'type' => '',
                ],
                'images' => [
                    'type' => '*img',
                ],
            ],
            'thumbsDir' => '.thumbs',
            'thumbWidth' => 100,
            'thumbHeight' => 100,
        ];
    }
}
