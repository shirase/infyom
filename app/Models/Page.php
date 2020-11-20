<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Eloquent as Model;
use Kalnoy\Nestedset\NodeTrait;

/**
 * Class Page
 * @package App\Models
 *
 * @property integer $parent_id
 * @property string $title
 * @property string $slug
 * @property boolean $status
 * @property string $body
 * @property string $type
 */
class Page extends Model
{
    use Sluggable, NodeTrait {
        NodeTrait::replicate as replicateNode;
        Sluggable::replicate as replicateSlug;
    }

    public function replicate(array $except = null)
    {
        $instance = $this->replicateNode($except);
        (new SlugService())->slug($instance, true);

        return $instance;
    }

    public $table = 'pages';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const STATUS_DRAFT = 0;
    const STATUS_PUBLISH = 1;
    const STATUS_HIDE = 2;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public $fillable = [
        'parent_id',
        'title',
        'slug',
        'status',
        'body',
        'type',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'parent_id' => 'integer',
        'title' => 'string',
        'slug' => 'string',
        'status' => 'integer',
        'body' => 'string',
        'type' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
    ];

    public static function statuses()
    {
        return [
            self::STATUS_DRAFT => __('Черновик'),
            self::STATUS_PUBLISH => __('Опубликовано'),
            self::STATUS_HIDE => __('Не показывать'),
        ];
    }

    public function statusName()
    {
        $statuses = static::statuses();
        return $statuses[$this->status];
    }

    public static function types()
    {
        return [
            'article_index' => __('Список статей'),
            'article_category' => __('Категории статей'),
        ];
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublish($query)
    {
        return $query->where('status', self::STATUS_PUBLISH);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->whereIn('status', [self::STATUS_PUBLISH, self::STATUS_HIDE]);
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
