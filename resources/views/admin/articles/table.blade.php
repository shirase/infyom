<div class="table-responsive">
    <table class="table" id="articles-table">
        <thead>
            <tr>
                <th>Publish At</th>
        <th>Title</th>
        <th>Alias</th>
        <th>Description</th>
        <th>Body</th>
        <th>Category Id</th>
        <th>Active</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{ $article->publish_at }}</td>
            <td>{{ $article->title }}</td>
            <td>{{ $article->alias }}</td>
            <td>{{ $article->description }}</td>
            <td>{{ $article->body }}</td>
            <td>{{ $article->category_id }}</td>
            <td>{{ $article->active }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.articles.destroy', $article->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.articles.show', [$article->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('admin.articles.edit', [$article->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
