<div class="table-responsive">
    <table class="table" id="articleCategories-table" data-sortable>
        <thead>
            <tr>
                <th data-position>@sortablelink('position', __('fields.position'))</th>
                <th>@sortablelink('title', __('fields.title'))</th>
                <th>@sortablelink('slug', __('fields.slug'))</th>
                <th>@lang('fields.status')</th>
                <th colspan="3">@lang('Действия')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($articleCategories as $articleCategory)
            <tr>
                <td data-id="{{ $articleCategory->id }}">{{ $articleCategory->position }}</td>
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
