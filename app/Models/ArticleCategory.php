<?php

namespace App\Models;

use Eloquent as Model;
use Kyslik\ColumnSortable\Sortable;

/**
 * Class ArticleCategory
 * @package App\Models
 * @version September 16, 2020, 1:43 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $articles
 * @property \Illuminate\Database\Eloquent\Collection $article1s
 * @property string $title
 * @property string $alias
 */
class ArticleCategory extends Model
{
    use Sortable;

    public $table = 'article_categories';

    public $timestamps = false;

    public $sortable = ['title', 'alias'];

    public $fillable = [
        'title',
        'alias'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'alias' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function articles()
    {
        return $this->hasMany(\App\Models\Article::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function article1s()
    {
        return $this->belongsToMany(\App\Models\Article::class, 'articles_categories');
    }
}
