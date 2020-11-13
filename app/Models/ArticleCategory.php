<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Eloquent as Model;

/**
 * Class ArticleCategory
 * @package App\Models
 * @version November 13, 2020, 1:13 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $articles
 * @property \Illuminate\Database\Eloquent\Collection $article1s
 * @property string $title
 * @property string $slug
 * @property boolean $status
 */
class ArticleCategory extends Model
{
    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public $table = 'article_categories';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'title',
        'slug',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'slug' => 'string',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function articles()
    {
        return $this->belongsToMany(\App\Models\Article::class, 'article_category');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function article1s()
    {
        return $this->hasMany(\App\Models\Article::class, 'category_id');
    }
}
