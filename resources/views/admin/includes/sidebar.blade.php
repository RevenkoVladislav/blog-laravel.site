<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <x-sidebar-menu route="admin.index" icon="fas fa-home" label="Домой" activePattern="admin.index"/>
                <x-sidebar-menu route="admin.user.index" icon="fas fa-users" label="Пользователи"/>
                <x-sidebar-menu route="admin.post.index" icon="fas fa-clipboard" label="Посты"/>
                <x-sidebar-menu route="admin.category.index" icon="fas fa-th-list" label="Категории"/>
                <x-sidebar-menu route="admin.tag.index" icon="fas fa-tags" label="Тэги"/>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
