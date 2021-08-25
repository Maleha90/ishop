<div class="content-wrapper" style="min-height: 122px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование <?php echo $product->title?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo ADMIN;?>">Главная</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo ADMIN;?>/product">Категория товаров</a></li>
                        <li class="breadcrumb-item">Редактирование</li>
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
                    <form action="<?php echo ADMIN;?>/product/edit" method="post" data-toggle="validator" id="add">
                        <div class="box-body">
                            <div class="form-group has-feedback" data-toggle="validator">
                                <label for="title">Наименование товара</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Наименование товара" value="<?php echo h($product->title); ?>" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group">
                                <label for="category_id">Родительская категория</label>
                                <?php new \app\widgets\menu\Menu([
                                    'tpl' => WIDGETS . '/Menu/menu_tpl/select.php',
                                    'container' => 'select',
                                    'cache' => 0,
                                    'cacheKey' => 'admin_select',
                                    'class' => 'form-control',
                                    'attrs' => [
                                        'name' => 'category_id',
                                        'id' => 'category_id',
                                    ],
                                ]) ?>
                            </div>

                            <div class="form-group">
                                <label for="keywords">Ключевые слова</label>
                                <input type="text" name="keywords" class="form-control" id="keywords" placeholder="Ключевые слова" value="<?php echo h($product->keywords); ?>">
                            </div>

                            <div class="form-group">
                                <label for="description">Описание</label>
                                <input type="text" name="description" class="form-control" id="description" placeholder="Описание" value="<?php echo h($product->description); ?>">
                            </div>

                            <div class="form-group has-feedback">
                                <label for="price">Цена</label>
                                <input type="text" name="price" class="form-control" id="price" placeholder="Цена" pattern="^[0-9.]{1,}$" value="<?php echo $product->price; ?>" required data-error="Допускаются цифры и десятичная точка">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="old_price">Старая цена</label>
                                <input type="text" name="old_price" class="form-control" id="old_price" placeholder="Старая цена" pattern="^[0-9.]{1,}$" value="<?php echo $product->old_price; ?>" data-error="Допускаются цифры и десятичная точка">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="content">Контент</label>
                                <textarea name="content" id="editor1" cols="80" rows="10"><?php echo $product->content;?></textarea>
                            </div>

                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="status" <?php echo $product->status ? ' checked' : null;?>> Статус
                                </label>
                            </div>

                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="hit" <?php echo $product->hit ? ' checked' : null;?>> Хит
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="related"> Связанные товары</label>
                                <select name="related[]" class="form-control select2 " id="related" multiple>
                                    <?php if(!empty($related_product)):?>
                                        <?php foreach ($related_product as $item):?>
                                            <option value="<?php echo $item['related_id']?>" selected><?php echo $item['title']?></option>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                </select>
                            </div>

                            <?php new \app\widgets\Filter\Filter( null,WIDGETS . '/Filter/admin_filter_tpl.php')?>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <div class="card card-danger file-upload">
                                        <div class="card-header">
                                            <h3 class="card-title">Базовое изображение</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="single" class="btn btn-success" data-url="product/add-image" data-name="single">Выбрать файл</div>
                                            <p><small>Рекомендуемые размеры: 125x200</small></p>
                                            <div class="single">
                                                <?php if(!empty($product)):?>
                                                    <img src="/images/<?php echo $product->img;?>" alt="" style="max-height: 150px; cursor: pointer;">
                                                <?php endif;?>
                                            </div>
                                        </div>
                                        <div class="overlay">
                                            <i class="fa fa-refresh fa-spin"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-primary file-upload">
                                        <div class="card-header">
                                            <h3 class="card-title">Картинки галереи</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="multi" class="btn btn-success" data-url="product/add-image" data-name="multi">Выбрать файл</div>
                                            <p><small>Рекомендуемые размеры: 700x1000</small></p>
                                            <div class="multi">
                                                <?php if(!empty($gallery)):?>
                                                    <?php foreach($gallery as $item):?>
                                                        <img src="/images/<?php echo $item;?>" alt="" style="max-height: 150px; cursor: pointer;" data-id="<?php echo $product->id?>" data-src="<?php echo $item;?>" class="del-item">
                                                    <?php endforeach;?>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                        <div class="overlay">
                                            <i class="fa fa-refresh fa-spin"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="<?php echo $product->id;?>">
                            <button type="submit" class="btn btn-success">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>