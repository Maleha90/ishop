<div class="content-wrapper" style="min-height: 122px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Список пользователей</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo ADMIN;?>">Главная</a></li>
                        <li class="breadcrumb-item">Список пользователей</li>
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
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Логин</th>
                                    <th>Email</th>
                                    <th>Имя</th>
                                    <th>Роль</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($users as $user): ?>
                                    <td><?php echo $user->id;?></td>
                                    <td><?php echo $user->login;?></td>
                                    <td><?php echo $user->email;?></td>
                                    <td><?php echo $user->name;?></td>
                                    <td><?php echo $user->role;?></td>
                                    <td><a href="<?php echo ADMIN;?>/user/edit?id=<?php echo $user->id;?>"><i class="fa fa-fw fa-eye"></i></a>
                                        <a class="delete" href="<?php echo ADMIN;?>/user/delete?id=<?php echo $user->id;?>"><i class="fa fa-fw fa-times text-danger"></i></a></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <p>(<?php echo count($users);?> пользователей из <?php echo $count;?>)</p>
                            <?php if($pagination->countPages > 1): ?>
                                <?php echo $pagination;?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>