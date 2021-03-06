<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="/adminlte/">
    <?php echo $this->getMeta();?>
    <link rel="shortcut icon" href="/public/images/cart.png" type="image/png" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/select2/css/select2.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="my.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <div class="pull-right">
                    <a class="btn btn-danger btn-flat" href="/user/logout" role="button">Exit</a>
                </div>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?php echo PATH;?>" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminShop</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="#" class="d-block"><?php echo $_SESSION['user']['name']?></a href="#" >
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item treeview">
                        <a href="<?php echo ADMIN;?>" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                HOME
                            </p>
                        </a>
                    </li>
                    <li class="nav-item treeview">
                        <a href="<?php echo ADMIN;?>/order" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>
                                ????????????
                            </p>
                        </a>
                    </li>
                    <li class="nav-item treeview">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                ??????????????????
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo ADMIN;?>/category" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>???????????? ??????????????????</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo ADMIN;?>/category/add" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>????????????????</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item treeview">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-archive"></i>
                            <p>
                                ????????????
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo ADMIN;?>/product" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>?????????????????? ??????????????</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo ADMIN;?>/product/add" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>????????????????</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item treeview">
                        <a href="<?php echo ADMIN;?>/cache" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                ??????
                            </p>
                        </a>
                    </li>
                    <li class="nav-item treeview">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                ????????????????????????
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo ADMIN;?>/user" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>???????????? ??????????????????????????</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo ADMIN;?>/user/add" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>???????????????? ????????????????????????</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item treeview">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-filter"></i>
                            <p>
                                ??????????????
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo ADMIN;?>//filter/attribute-group" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>???????????? ????????????????</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo ADMIN;?>/filter/attribute" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>??????????????</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <?php echo $content;?>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
    </div>
</footer>

<script>
    var path = '<?php echo PATH;?>',
        pathadmin = '<?php echo ADMIN;?>'
</script>


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.js"></script>

<script src="plugins/ckeditor/ckeditor.js"></script>
<script src="plugins/ckeditor/adapters/jquery.js"></script>

<script src="/js/validator.js"></script>
<script src="/js/ajaxupload.js"></script>
<script src="my.js"></script>
</body>
</html>

