<?php

namespace App\Builders;

use App\Models\Page;

/**
 * @method Page first()
 * @method Page[] get()
 *
 * @see Page
 */
class PageBuilder extends \Illuminate\Database\Eloquent\Builder
{
    public function active()
    {
        return $this->whereIn('status', [Page::STATUS_PUBLISH, Page::STATUS_HIDE]);
    }

    public function publish()
    {
        return $this->where('status', Page::STATUS_PUBLISH);
    }

    public function slug($slug)
    {
        return $this->where('slug', $slug);
    }
}
