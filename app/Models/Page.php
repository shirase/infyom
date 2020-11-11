<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Eloquent as Model;
use Kalnoy\Nestedset\NodeTrait;

/**
 * Class Page
 * @package App\Models
 * @version November 10, 2020, 12:34 pm UTC
 *
 * @property integer $parent_id
 * @property string $title
 * @property string $slug
 * @property boolean $status
 * @property string $body
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
        'body'
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
        'status' => 'boolean',
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
}
