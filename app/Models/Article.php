<?php

namespace App\Models;

use App\Builders\ArticleBuilder;
use Cviebrock\EloquentSluggable\Sluggable;
use Eloquent as Model;

/**
 * Class Article
 * @package App\Models
 * @version November 13, 2020, 1:13 pm UTC
 *
 * @property \App\Models\ArticleCategory $category
 * @property \Illuminate\Database\Eloquent\Collection $articleCategory1s
 * @property string|\Carbon\Carbon $publish_at
 * @property integer $category_id
 * @property boolean $status
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $body
 *
 * @method static ArticleBuilder query()
 */
class Article extends Model
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

    public $table = 'articles';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const STATUS_DRAFT = 0;
    const STATUS_PUBLISH = 1;

    public $fillable = [
        'publish_at',
        'category_id',
        'status',
        'title',
        'slug',
        'description',
        'body'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'publish_at' => 'datetime',
        'category_id' => 'integer',
        'status' => 'integer',
        'title' => 'string',
        'slug' => 'string',
        'description' => 'string',
        'body' => 'string'
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category()
    {
        return $this->belongsTo(\App\Models\ArticleCategory::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function categories()
    {
        return $this->belongsToMany(\App\Models\ArticleCategory::class, 'article_category');
    }

    public static function statuses()
    {
        return [
            self::STATUS_DRAFT => __('Черновик'),
            self::STATUS_PUBLISH => __('Опубликовано'),
        ];
    }

    public function statusName()
    {
        $statuses = static::statuses();
        return $statuses[$this->status];
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', self::STATUS_PUBLISH);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }
}
