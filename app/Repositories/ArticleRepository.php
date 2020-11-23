<?php

namespace App\Repositories;

use App\Builders\ArticleBuilder;
use App\Models\Article;

/**
 * Class ArticleRepository
 *
 * @method ArticleBuilder allQuery($search = [], $skip = null, $limit = null)
 *
 * @package App\Repositories
 * @version September 18, 2020, 10:21 am UTC
*/

class ArticleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'publish_at',
        'title',
        'alias',
        'description',
        'body',
        'category_id',
        'active'
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
        return Article::class;
    }
}
