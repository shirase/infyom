<?php

namespace App\Repositories;

use App\Models\ArticleCategory;
use App\Repositories\BaseRepository;

/**
 * Class ArticleCategoryRepository
 * @package App\Repositories
 * @version September 16, 2020, 1:43 pm UTC
*/

class ArticleCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'alias'
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
        return ArticleCategory::class;
    }

    public function allQuery($search = [], $skip = null, $limit = null)
    {
        $query = parent::allQuery($search, $skip, $limit);
        return $query->sortable('title');
    }
}
