<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <x-sidebar-menu route="personal.index" icon="far fa-home" label="Главная" activePattern="personal.index" />
                <x-sidebar-menu route="personal.liked.index" icon="far fa-heart" label="Понравившиеся посты" />
                <x-sidebar-menu route="personal.comment.index" icon="far fa-comments" label="Комментарии" />
                <li class="nav-item">
                    <a href="{{ route('post.index') }}" class="nav-link"><i class="nav-icon far fa-compass"></i>
                        <p>
                            К постам
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
