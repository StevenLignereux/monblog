<?php

namespace App\DataTables;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PostsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query): DataTableAbstract
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'posts.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param Post $post
     * @return Builder
     */
    public function query(Post $post): Builder
    {
        $query = isRole('redac') ? auth()->user()->posts() : $post->newQuery();

        if (Route::currentRouteName('posts.indexnew')) {
            $query->has('unreadNotifications');
        }

        return $query
            ->select(
                'posts.id',
                'slug',
                'title',
                'active',
                'posts.created_at',
                'posts.updated_at',
                'user_id')
            ->with(
                'user:id, name',
                'categories:title'
            )
            ->withCount('comments');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): \Yajra\DataTables\Html\Builder
    {
        return $this->builder()
                    ->setTableId('posts-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Blfrtip')
                    ->lengthMenu();
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        $columns = [
            Column::make('title')->title('Author')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Posts_' . date('YmdHis');
    }
}
