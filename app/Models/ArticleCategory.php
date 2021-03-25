<?php

namespace App\Models;

use App\Builders\ArticleCategoryBuilder;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Eloquent as Model;
use Kalnoy\Nestedset\NestedSet;
use Kalnoy\Nestedset\NodeTrait;
use Kyslik\ColumnSortable\Sortable;

/**
 * Class ArticleCategory
 * @package App\Models
 *
 * @property int $id;
 * @property string $title
 * @property string $slug
 * @property integer $status
 * @property integer $_lft
 *
 * @method static ArticleCategoryBuilder query()
 */
class ArticleCategory extends Model
{
    use Sluggable, NodeTrait, Sortable {
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

    public $sortable = [NestedSet::LFT, 'title', 'slug'];

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
        'status' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
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
