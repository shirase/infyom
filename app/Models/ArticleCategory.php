<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Eloquent as Model;
use Kyslik\ColumnSortable\Sortable;

/**
 * Class ArticleCategory
 * @package App\Models
 *
 * @property string $title
 * @property string $slug
 * @property integer $status
 */
class ArticleCategory extends Model
{
    use Sluggable, Sortable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public $sortable = ['title', 'slug'];

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
        'title' => 'string',
        'slug' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
    ];

    use LabelsTrait;
    public static $labels = [
        'title' => 'Название',
        'status' => 'Статус'
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
}
