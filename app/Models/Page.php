<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Page
 * @package App\Models
 * @version September 16, 2020, 1:41 pm UTC
 *
 * @property string $title
 * @property string $alias
 * @property string $body
 * @property boolean $active
 */
class Page extends Model
{

    public $table = 'pages';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'title',
        'alias',
        'body',
        'active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'alias' => 'string',
        'body' => 'string',
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

    
}
