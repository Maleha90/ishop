<?php //$parent = isset($category['childs']); ?>
<li>
    <a href="category/<?php echo $category['alias'];?>"><?php echo $category['title'];?></a>
    <?php if(isset($category['childs'])): ?>
        <ul>
            <?php echo $this->getMenuHtml($category['childs']);?>
        </ul>
    <?php endif; ?>
</li>
