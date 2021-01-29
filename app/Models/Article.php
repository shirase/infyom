<?php

namespace App\Models;

use App\Builders\ArticleBuilder;
use Cviebrock\EloquentSluggable\Sluggable;
use Eloquent as Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Article
 * @package App\Models
 * @version November 13, 2020, 1:13 pm UTC
 *
 * @property \App\Models\ArticleCategory $category
 * @property \Illuminate\Database\Eloquent\Collection $articleCategory1s
 * @property string|\Carbon\Carbon $publish_at
 * @property string|\Carbon\Carbon $created_at
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

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('only_my_columns', function (Builder $builder) {
            $builder->select($builder->getModel()->getTable().'.*');
        });
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
        'created_at' => 'datetime',
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
        'category_id' => 'integer',
        'status' => 'integer',
        'publish_at' => 'date',
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

    public function newEloquentBuilder($query)
    {
        return new ArticleBuilder($query);
    }
}
