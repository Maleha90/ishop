<!-- Main content -->
<div class="content-wrapper" style="min-height: 122px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Список категорий</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo ADMIN;?>">Главная</a></li>
                        <li class="breadcrumb-item">Список категорий</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <?php new \app\widgets\Menu\Menu([
                            'tpl' => WIDGETS . '/Menu/menu_tpl/menu_admin.php',
                            'container' => 'div',
                            'cache' => 0,
                            'cacheKey' => 'admin_cat',
                            'class' => 'list-group list-group-root well',
                        ])?>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
