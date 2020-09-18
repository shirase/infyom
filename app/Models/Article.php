<?php

namespace App\Models;

use Carbon\Carbon;
use Eloquent as Model;
use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;

/**
 * Class Article
 * @package App\Models
 * @version September 18, 2020, 10:21 am UTC
 *
 * @property \App\Models\ArticleCategory $category
 * @property \Illuminate\Database\Eloquent\Collection $articleCategories
 * @property string|\Carbon\Carbon $publish_at
 * @property string $title
 * @property string $alias
 * @property string $description
 * @property string $body
 * @property integer $category_id
 * @property boolean $active
 * @property Carbon $created_at
 */
class Article extends Model
{
    public $table = 'articles';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'publish_at',
        'title',
        'alias',
        'description',
        'body',
        'category_id',
        'active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'publish_at' => 'datetime',
        'title' => 'string',
        'alias' => 'string',
        'description' => 'string',
        'body' => 'string',
        'category_id' => 'integer',
        'active' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'active' => 'required'
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
    public function articleCategories()
    {
        return $this->belongsToMany(\App\Models\ArticleCategory::class, 'articles_categories');
    }
}
