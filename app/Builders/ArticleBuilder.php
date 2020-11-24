<?php

namespace App\Builders;

use App\Models\Article;
use App\Models\ArticleCategory;

/**
 * @method Article first()
 * @method Article[] get()
 *
 * @see Article
 */
class ArticleBuilder extends \Illuminate\Database\Eloquent\Builder
{
    public function active()
    {
        return $this->where('status', ArticleCategory::STATUS_PUBLISH);
    }

    public function slug($slug)
    {
        return $this->where('slug', $slug);
    }

    public function category($category_id)
    {
        return $this->where('category_id', $category_id);
    }
}
