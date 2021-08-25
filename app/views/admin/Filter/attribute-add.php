<!-- Main content -->
<div class="content-wrapper" style="min-height: 122px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Новаый фильтор</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo ADMIN;?>">Главная</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo ADMIN;?>/filter/attribute">Группы фильтров</a></li>
                        <li class="breadcrumb-item">Новаый фильтор</li>
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
                    <form action="<?php echo ADMIN;?>/filter/attribute-add" method="post" data-toggle="validator" id="add">
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="value">Наименование</label>
                                <input type="text" name="value" class="form-control" id="value" placeholder="Наименование группы" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Группа</label>
                                <select name="attr_group_id" id="category_id" class="form-control">
                                    <option>Выберите группу</option>
                                    <?php foreach($group as $item):?>
                                        <option value="<?php echo $item->id;?>"><?php echo $item->title;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
