<?php

namespace App\Builders;

use App\Models\Article;
use App\Models\ArticleCategory;

/**
 * @method self slug(string $slug)
 * @method self active()
 *
 * @method Article first()
 * @method Article[] get()
 *
 * @see ArticleCategory
 */
class ArticleCategoryBuilder extends \Illuminate\Database\Eloquent\Builder {}
