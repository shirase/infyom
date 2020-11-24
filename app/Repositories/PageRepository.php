<?php

namespace App\Repositories;

use App\Builders\PageBuilder;
use App\Models\Page;

/**
 * Class PageRepository
 *
 * @method PageBuilder allQuery($search = [], $skip = null, $limit = null)
 *
 * @package App\Repositories
 * @version November 10, 2020, 12:34 pm UTC
*/

class PageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'parent_id',
        'title',
        'slug',
        'status',
        'body'
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
        return Page::class;
    }
}
