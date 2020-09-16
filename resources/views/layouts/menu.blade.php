
<li class="{{ Request::is('admin/pages*') ? 'active' : '' }}">
    <a href="{{ route('admin.pages.index') }}"><i class="fa fa-edit"></i><span>Pages</span></a>
</li>

<li class="{{ Request::is('admin/articles*') ? 'active' : '' }}">
    <a href="{{ route('admin.articles.index') }}"><i class="fa fa-edit"></i><span>Articles</span></a>
</li>

<li class="{{ Request::is('admin/article-categories*') ? 'active' : '' }}">
    <a href="{{ route('admin.article-categories.index') }}"><i class="fa fa-edit"></i><span>Article categories</span></a>
</li>
