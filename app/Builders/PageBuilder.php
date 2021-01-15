<?php

namespace App\Builders;

use App\Models\Page;
use Kalnoy\Nestedset\QueryBuilder;

/**
 * @method Page first()
 * @method Page[]|\Illuminate\Database\Eloquent\Collection get()
 *
 * @see Page
 */
class PageBuilder extends QueryBuilder
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
