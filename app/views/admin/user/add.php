<div class="content-wrapper" style="min-height: 122px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить пользователя</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo ADMIN;?>">Главная</a></li>
                        <li class="breadcrumb-item">Добавить пользователя</li>
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
                    <form method="post" action="/user/signup" role="form" data-toggle="validator">
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="login">Логин</label>
                                <input class="form-control" name="login" id="login" type="text" value="<?php echo  isset($_SESSION['form_data']['login']) ? $_SESSION['form_data']['login'] : '' ?>" required>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="password">Password</label>
                                <input class="form-control" name="password" id="password" type="password" data-minlength="6" data-error="Пароль должен включать не менее 6 символов" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="email">Email</label>
                                <input class="form-control" name="email" id="email" type="email" value="<?php echo  isset($_SESSION['form_data']['email']) ? $_SESSION['form_data']['email'] : '' ?>" required>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="name">Имя</label>
                                <input class="form-control" name="name" id="name" type="text" value="<?php echo  isset($_SESSION['form_data']['name']) ? $_SESSION['form_data']['name'] : '' ?>" required>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="address">Адрес</label>
                                <input class="form-control" name="address" id="address" value="<?php echo  isset($_SESSION['form_data']['address']) ? $_SESSION['form_data']['address'] : '' ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Роль</label>
                                <select class="form-control" name="role">
                                    <option value="user">Пользователь</option>
                                    <option value="admin">Администратор</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                    <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>