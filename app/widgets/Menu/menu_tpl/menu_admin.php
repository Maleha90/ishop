<?php
    $parent = isset($category['childs']);
    if(!$parent) {
        $delete = '<a href="' . ADMIN . '/category/delete?id=' . $id . '" class="delete"><i class="fa fa-fw fa-times text-danger"></i></a>';
    }else {
        $delete = '<i class="fa fa-fw fa-times"></i>';
    }
?>
<p class="item-p">
    <a class="list-group-item" href="<?php echo ADMIN;?>/category/edit?id=<?php echo $id;?>"><?php echo $category['title'];?></a> <span><?php echo $delete;?></span>
</p>
<?php if($parent):?>
    <div class="list-group">
        <?php echo  $this->getMenuHtml($category['childs']); ?>
    </div>
<?php endif;?>
