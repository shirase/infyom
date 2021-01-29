<?php

namespace App\Builders;

use App\Models\ArticleCategory;
use Illuminate\Support\Collection;

/**
 * @method ArticleCategory first()
 * @method ArticleCategory[]|Collection get()
 *
 * @see ArticleCategory
 */
class ArticleCategoryBuilder extends \Illuminate\Database\Eloquent\Builder
{
    public function active()
    {
        return $this->where('status', ArticleCategory::STATUS_PUBLISH);
    }

    public function slug($slug)
    {
        return $this->where('slug', $slug);
    }
}
