<div class="table-responsive">
    <table class="table" id="articleCategories-table">
        <thead>
            <tr>
                <th>@sortablelink('title', \App\Models\ArticleCategory::label('title'))</th>
                <th>@sortablelink('slug', \App\Models\ArticleCategory::label('slug'))</th>
                <th>{{ \App\Models\ArticleCategory::label('status') }}</th>
                <th colspan="3">@lang('Действия')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($articleCategories as $articleCategory)
            <tr>
                <td>{{ $articleCategory->title }}</td>
                <td>{{ $articleCategory->slug }}</td>
                <td>{{ $articleCategory->statusName() }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.article-categories.destroy', $articleCategory->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.article-categories.show', [$articleCategory->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('admin.article-categories.edit', [$articleCategory->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $articleCategories->appends(\Request::except('page'))->render() !!}
</div>
