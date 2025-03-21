<?php

namespace App\Models;

use App\Builders\PageBuilder;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Eloquent as Model;
use Kalnoy\Nestedset\NodeTrait;

/**
 * Class Page
 * @package App\Models
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $title
 * @property string $slug
 * @property boolean $status
 * @property string $body
 * @property string $type
 *
 * @method static PageBuilder query()
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

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public $table = 'pages';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const STATUS_DRAFT = 0;
    const STATUS_PUBLISH = 1;
    const STATUS_HIDE = 2;

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
        'parent_id' => 'integer',
        'status' => 'integer',
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

    public function newEloquentBuilder($query)
    {
        return new PageBuilder($query);
    }
}
