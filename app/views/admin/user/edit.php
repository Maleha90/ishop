<div class="content-wrapper" style="min-height: 122px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пользователь <?php echo h($user->login);?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo ADMIN;?>">Главная</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo ADMIN;?>/user">Список пользователей</a></li>
                        <li class="breadcrumb-item">Пользователь <?php echo h($user->login);?></li>
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
                    <form action="<?php echo ADMIN;?>/user/edit" method="post" data-toggle="validator">
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="login">Логин</label>
                                <input type="text" class="form-control" name="login" id="login" value="<?php echo h($user->login);?>" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль, если хотите его изменить">
                            </div>
                            <div class="form-group has-feedback">
                                <label for="name">Имя</label>
                                <input type="text" class="form-control" name="name" id="name" value="<?php echo h($user->name);?>" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="<?php echo h($user->email);?>" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="address">Адрес</label>
                                <input type="text" class="form-control" name="address" id="address" value="<?php echo h($user->address);?>" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group">
                                <label>Роль</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="user"<?php if($user->role == 'user') echo ' selected'; ?>>Пользователь</option>
                                    <option value="admin"<?php if($user->role == 'admin') echo ' selected'; ?>>Администратор</option>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="<?php echo $user->id;?>">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>

                <h3>Заказы пользователя</h3>
                <div class="box">
                    <div class="box-body">
                        <?php if($orders): ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Статус</th>
                                        <th>Сумма</th>
                                        <th>Дата создания</th>
                                        <th>Дата изменения</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($orders as $order): ?>
                                        <?php $class = $order['status'] ? 'success' : ''; ?>
                                        <tr class="<?php echo $class;?>">
                                            <td><?php echo $order['id'];?></td>
                                            <td><?php echo $order['status'] ? 'Завершен' : 'Новый';?></td>
                                            <td><?php echo $order['sum'];?> <?php echo $order['currency'];?></td>
                                            <td><?php echo $order['date'];?></td>
                                            <td><?php echo $order['update_at'];?></td>
                                            <td><a href="<?php echo ADMIN;?>/order/view?id=<?php echo $order['id'];?>"><i class="fa fa-fw fa-eye"></i></a>
                                                <a class="delete" href="<?php echo ADMIN;?>/order/delete?id=<?php echo $order['id'];?>"><i class="fa fa-fw fa-times text-danger"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <p class="text-danger">Пользокатель пока ничего не заказывал...</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>