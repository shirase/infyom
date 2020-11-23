<?php

namespace App\Builders;

use App\Models\Page;

/**
 * @method self slug(string $slug)
 * @method self active()
 *
 * @method Page first()
 * @method Page[] get()
 */
class PageBuilder extends \Illuminate\Database\Eloquent\Builder {}
