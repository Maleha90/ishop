<!-- Main content -->
<div class="content-wrapper" style="min-height: 122px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Группы фильтров</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo ADMIN;?>">Главная</a></li>
                        <li class="breadcrumb-item">Группы фильтров</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <a href="<?php echo ADMIN;?>/filter/group-add" class="btn btn-primary"><i class="fa fa-fw fa-plus text-success"></i>Добавить группу</a>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Наименование</th>
                                    <th>Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($attrs_group as $item):?>
                                    <tr>
                                        <td><?php echo $item->title;?></td>
                                        <td>
                                            <a class="" href="<?php echo ADMIN;?>/filter/group-edit?id=<?php echo $item->id;?>"><i class="fa fa-fw fa-paint-brush text-success"></i></a>
                                            <a class="delete text-danger" href="<?php echo ADMIN;?>/filter/group-delete?id=<?php echo $item->id;?>"><i class="fa fa-fw fa-times text-danger"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>