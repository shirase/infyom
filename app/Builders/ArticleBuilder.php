<?php

namespace App\Builders;

use App\Models\Article;

/**
 * @method self slug(string $slug)
 * @method self active()
 *
 * @method Article first()
 * @method Article[] get()
 */
class ArticleBuilder extends \Illuminate\Database\Eloquent\Builder {}
