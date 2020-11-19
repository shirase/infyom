
<li class="{{ Request::is('admin/pages*') ? 'active' : '' }}">
    <a href="{{ route('admin.pages.index') }}"><i class="fa fa-edit"></i><span>Страницы</span></a>
</li>

<li class="treeview menu-open {{ Request::is('admin/article*') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-dashboard"></i> <span>Статьи</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu" style="display: block">
        <li class="{{ Request::is('admin/articles*') ? 'active' : '' }}">
            <a href="{{ route('admin.articles.index') }}"><i class="fa fa-edit"></i><span>Список</span></a>
        </li>

        <li class="{{ Request::is('admin/article-categories*') ? 'active' : '' }}">
            <a href="{{ route('admin.article-categories.index') }}"><i class="fa fa-edit"></i><span>Категории</span></a>
        </li>
    </ul>
</li>
