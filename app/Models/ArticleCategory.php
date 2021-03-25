<?php

namespace App\Models;

use App\Builders\ArticleCategoryBuilder;
use Cviebrock\EloquentSluggable\Sluggable;
use Eloquent as Model;
use Kyslik\ColumnSortable\Sortable;

/**
 * Class ArticleCategory
 * @package App\Models
 *
 * @property int $id;
 * @property string $title
 * @property string $slug
 * @property integer $status
 * @property integer $position
 *
 * @method static ArticleCategoryBuilder query()
 */
class ArticleCategory extends Model
{
    use Sluggable, Sortable, PositionTrait;

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

        ArticleCategory::creating(function ($model) {
            $model->position = ArticleCategory::max('position') + 1;
        });
    }

    public $sortable = ['position', 'title', 'slug'];

    public $table = 'article_categories';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const STATUS_DRAFT = 0;
    const STATUS_PUBLISH = 1;

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
        'position' => 'integer',
        'title' => 'string',
        'slug' => 'string',
        'status' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'position' => 'integer',
        'status' => 'integer',
    ];

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
        return new ArticleCategoryBuilder($query);
    }
}
