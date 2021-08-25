<!-- Main content -->
<div class="content-wrapper" style="min-height: 122px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Список заказов</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo ADMIN;?>">Главная</a></li>
                        <li class="breadcrumb-item">Список заказов</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Покупатель</th>
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
                                            <td><?php echo $order['name'];?></td>
                                            <td><?php echo $order['status'] ? 'Завершен' : 'Новый';?></td>
                                            <td><?php echo$order['sum'];?> <?php echo $order['currency'];?></td>
                                            <td><?php echo$order['date'];?></td>
                                            <td><?php echo $order['update_at'];?></td>
                                            <td><a href="<?php echo ADMIN;?>/order/view?id=<?php echo $order['id'];?>"><i class="fa fa-fw fa-eye"></i></a> <a class="delete" href="<?php echo ADMIN;?>/order/delete?id=<?php echo $order['id'];?>"><i class="fa fa-fw fa-times text-danger"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center">
                                <p>(<?php echo count($orders);?> заказа(ов) из <?php echo $count;?>)</p>
                                <?php if($pagination->countPages > 1): ?>
                                    <?php echo $pagination;?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </section>
</div>
