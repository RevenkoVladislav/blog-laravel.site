<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Панель управления</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <x-breadcrumb-link route="admin.index" label="Домой" activePattern="admin.index"/>
                    <x-breadcrumb-link route="admin.user.index" label="Пользователи" />
                    <x-breadcrumb-link route="admin.post.index" label="Посты" />
                    <x-breadcrumb-link route="admin.category.index" label="Категории" />
                    <x-breadcrumb-link route="admin.tag.index" label="Тэги" />
                    <x-breadcrumb-link route="admin.comment.index" label="Комментарии" />
                    <x-breadcrumb-link route="admin.like.index" label="Лайки" />
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
