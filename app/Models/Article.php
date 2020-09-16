<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Article
 * @package App\Models
 * @version September 16, 2020, 1:42 pm UTC
 *
 * @property \App\Models\ArticleCategory $category
 * @property \Illuminate\Database\Eloquent\Collection $articleCategory1s
 * @property string|\Carbon\Carbon $publish_at
 * @property string $title
 * @property string $alias
 * @property string $description
 * @property string $body
 * @property integer $category_id
 * @property boolean $active
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
    public function articleCategory1s()
    {
        return $this->belongsToMany(\App\Models\ArticleCategory::class, 'articles_categories');
    }
}
