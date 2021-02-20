<?php

namespace App\Widgets;

use App\Services\KCFinderService;
use Arrilot\Widgets\AbstractWidget;

class InlineEditor extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $kcfinder = app(KCFinderService::class);

        return view('widgets.inline_editor', [
            'config' => $this->config,
        ]);
    }
}
