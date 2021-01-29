<?php

namespace App\DataTables;

use App\Models\Article;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ArticleDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        $dataTable->addColumn('category_name', function (Article $model) {
            return $model->category->title ?? '';
        });
        $dataTable->editColumn('created_at', function (Article $model) {
            return $model->created_at->format('d.m.Y H:i:s');
        });
        $dataTable->editColumn('publish_at', function (Article $model) {
            return $model->publish_at->format('d.m.Y H:i:s');
        });
        $dataTable->editColumn('status', function (Article $model) {
            return $model->statusName();
        });
        return $dataTable->addColumn('action', 'admin.articles.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Article $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Article $model)
    {
        return $model->newQuery()
            ->with('category')
            ->select(['articles.*'])
        ;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['title' => __('Действия'), 'width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    //['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    //['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    //['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    //['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    //['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            new Column(['data' => 'publish_at', 'title' => __('fields.publish_at')]),
            new Column(['data' => 'title', 'title' => __('fields.title')]),
            new Column(['data' => 'slug', 'title' => __('fields.slug')]),
            new Column(['data' => 'category_name', 'name' => 'category.title', 'title' => __('fields.category_id')]),
            new Column(['data' => 'status', 'title' => __('fields.status')]),
            new Column(['data' => 'created_at', 'title' => __('fields.created_at')]),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return '$MODEL_NAME_PLURAL_SNAKE_$datatable_' . time();
    }
}
