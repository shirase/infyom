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

    /**
     * @return array
     */
    public function buildNav()
    {
        /** @var PageBuilder $query */
        $query = $this->allQuery();
        $tree = $query
            ->publish()
            ->orderBy(\Kalnoy\Nestedset\NestedSet::LFT)
            ->get()
            ->groupBy('parent_id')
        ;

        if (!$tree->has(''))
            return [];

        $menu = [];

        foreach ($tree->get('') as $page) {
            $menu[] = [
                'item' => $page,
                'items' => $tree->get($page->id) ?? null,
            ];
        }

        return $menu;
    }
}
