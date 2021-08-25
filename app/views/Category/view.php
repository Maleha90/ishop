<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <?php echo $breadcrumbs;?>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!---->
<div class="men-fashions">
    <div class="container">
        <div class="col-md-9 fashions">
            <div class="title">
                <h3>TOPS - TITLE</h3>
            </div>
            <?php if (!empty($products)):?>
            <div class="fashion-section">
                <?php $curr = \ishop\App::$app->getProperty('currency'); ?>
                <div class="fashion-grid1">
                    <?php foreach ($products as $product):?>
                    <div class="col-md-4 fashion-grid">
                        <a href="product/<?php echo $product->alias;?>"><img src="images/<?php echo $product->img;?>" alt=""/>
                            <div class="product">
                                <h3><?php echo $product->title;?></h3>
                                <?php if($product->old_price): ?>
                                    <small><del class="not-avaliable"><?php echo $curr['symbol_left'];?><?php echo $product->old_price * $curr['value'];?><?php echo $curr['symbol_right'];?></del></small>
                                <?php endif; ?>
                                <p><?php echo $curr['symbol_left'];?><?php echo $product->price * $curr['value'];?><?php echo $curr['symbol_right'];?></p>
                            </div>
                        </a>
                        <div class="fashion-view"><span></span>
                            <div class="clearfix"></div>
                            <h4><a href="product/<?php echo $product->alias;?>">Quick View</a></h4>
                        </div>
                    </div>
                    <?php endforeach;?>
                    <div class="clearfix"></div>
                    <div class="text-center">
                        <p>(<?php echo count($products)?> товара(ов) из <?php echo $total?>)</p>
                        <?php if($pagination->countPages > 1): ?>
                            <?echo $pagination;?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif;?>
        </div>
        <div class="col-md-3 side-bar">
            <?php new \app\widgets\Filter\Filter();?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!---->