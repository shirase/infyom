<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Data
 * @package App\Models
 * @version March 10, 2023, 10:08 am UTC
 *
 * @property string $key
 * @property string $data
 */
class Data extends Model
{

    public $table = 'data';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'key',
        'data'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'key' => 'string',
        'data' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'key' => 'required|string|max:100',
        'data' => 'nullable|string'
    ];

    
}
