<?php

namespace App\Repositories;

use App\Models\Data;
use App\Repositories\BaseRepository;

/**
 * Class DataRepository
 * @package App\Repositories
 * @version March 10, 2023, 9:15 am UTC
*/

class DataRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'key'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Data::class;
    }

    public function getByKey($key)
    {
        return Data::query()->where('key', $key)->firstOrNew(['key' => $key]);
    }
}
