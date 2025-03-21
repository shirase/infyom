<div class="table-responsive">
    <table class="table" id="pages-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>{{ __('fields.title') }}</th>
                <th>{{ __('fields.slug') }}</th>
                <th>{{ __('fields.status') }}</th>
                <th colspan="3">@lang('Действия')</th>
            </tr>
        </thead>
        <?php $groupId = 0; ?>
        <tbody>
        @foreach($pages as $i => $page)
            <?php /** @var \App\Models\Page $page */ ?>
            <tr>
                <td>{{ $page->id }}</td>
                <td>
                    @foreach($page->getAncestors() as $ancestor)
                        -
                    @endforeach
                    {{ $page->title }}
                </td>
                <td>{{ $page->slug }}</td>
                <td>{{ $page->statusName() }}</td>

                <td>
                    {!! Form::open(['route' => ['admin.pages.destroy', $page->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.pages.show', [$page->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('admin.pages.edit', [$page->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
