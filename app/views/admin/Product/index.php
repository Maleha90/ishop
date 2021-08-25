<div class="content-wrapper" style="min-height: 122px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Категория товаров</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo ADMIN;?>">Главная</a></li>
                        <li class="breadcrumb-item">Категория товаров</li>
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
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Категория</th>
                                    <th>Наименование</th>
                                    <th>Цена</th>
                                    <th>Статус</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($products as $product): ?>
                                    <tr>
                                        <td><?php echo $product['id'];?></td>
                                        <td><?php echo $product['cat'];?></td>
                                        <td><?php echo $product['title'];?></td>
                                        <td><?php echo $product['price'];?></td>
                                        <td><?php echo $product['status'] ? 'On' : 'Off';?></td>
                                        <td><a href="<?php echo ADMIN;?>/product/edit?id=<?php echo $product['id'];?>"><i class="fa fa-fw fa-eye"></i></a> <a class="delete" href="<?php echo ADMIN;?>/product/delete?id=<?php echo $product['id'];?>"><i class="fa fa-fw fa-times text-danger"></i></a></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <p>(<?php echo count($products);?> товаров из <?php echo $count;?>)</p>
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