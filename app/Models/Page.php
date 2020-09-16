<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Page
 * @package App\Models
 * @version September 16, 2020, 12:30 pm UTC
 *
 * @property string $name
 * @property string $alias
 */
class Page extends Model
{

    public $table = 'pages';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name',
        'alias'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'alias' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    
}
