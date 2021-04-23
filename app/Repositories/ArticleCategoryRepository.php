<?php

namespace App\Repositories;

use App\Builders\ArticleCategoryBuilder;
use App\Models\ArticleCategory;
use Kalnoy\Nestedset\NestedSet;

/**
 * Class ArticleCategoryRepository
 *
 * @method ArticleCategory find($id, $columns = ['*'])
 * @method ArticleCategory makeModel()
 *
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

    /**
     * @param array $search
     * @param null $skip
     * @param null $limit
     * @return ArticleCategoryBuilder
     */
    public function allQuery($search = [], $skip = null, $limit = null)
    {
        return parent::allQuery($search, $skip, $limit)->sortable(NestedSet::LFT);
    }
}
