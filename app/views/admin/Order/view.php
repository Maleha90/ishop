<div class="content-wrapper" style="min-height: 122px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Заказ №<?php echo $orders['id'];?>
                        <?php if (!$orders['status']):?>
                            <a href="<?php echo ADMIN?>/order/change?id=<?php echo $orders['id']?>&status=1" class="btn btn-success btn-primary">Одобрить</a>
                        <?php else:?>
                            <a href="<?php echo ADMIN?>/order/change?id=<?php echo $orders['id']?>&status=0" class="btn btn-default btn-primary">Вернуть на доработку</a>
                        <?php endif;?>
                            <a href="<?php echo ADMIN?>/order/delete?id=<?php echo $orders['id']?>" class="btn btn-danger btn-primary delete">Удалить</a>
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo ADMIN;?>">Главная</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo ADMIN;?>/order"> Список заказов</a></li>
                        <li class="breadcrumb-item">Заказ№ <?php echo $orders['id'];?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td>Номер заказа</td>
                                    <td><?php echo $orders['id']?></td>
                                </tr>
                                <tr>
                                    <td>Дата заказа</td>
                                    <td><?php echo $orders['date']?></td>
                                </tr>
                                <tr>
                                    <td>Дата изменения</td>
                                    <td><?php echo $orders['update_at']?></td>
                                </tr>
                                <tr>
                                    <td>Кол-во позиций в заказе</td>
                                    <td><?php echo count($order_product);?></td>
                                </tr>
                                <tr>
                                    <td>Сумма заказа</td>
                                    <td><?php echo $orders['sum']?> <?php echo $orders['currency']?></td>
                                </tr>
                                <tr>
                                    <td>Имя заказчика</td>
                                    <td><?php echo $orders['name']?></td>
                                </tr>
                                <tr>
                                    <td>Статус</td>
                                    <td><?php echo $orders['status'] ? 'Завешен' : 'Новый'?></td>
                                </tr>
                                <tr>
                                    <td>Комментарий</td>
                                    <td><?php echo $orders['note']?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <h3>Детали заказа</h3>
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Наименование</th>
                                    <th>Кол-во</th>
                                    <th>Цена</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $qty = 0; foreach ($order_product as $product):?>
                                    <tr>
                                        <td><?php echo $product->id?></td>
                                        <td><?php echo $product->title?></td>
                                        <td><?php echo $product->qty; $qty += $product->qty?></td>
                                        <td><?php echo $product->price?> <?php echo $orders['currency']?></td>
                                    </tr>
                                <?php endforeach;?>
                                <tr class="active">
                                    <td colspan="2">
                                        <b>Итого:</b>
                                    </td>
                                    <td><b><?php echo $qty?></b></td>
                                    <td><b><?php echo $orders['sum']?> <?php echo $orders['currency']?></b></td>
                                </tr>
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
