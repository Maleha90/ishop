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
<div class="single-section">
    <div class="col-md-8 fashions2">
        <?php if ($galery):?>
        <div class="slider2">
            <ul class="rslides rslider" id="slider2">
                <?php foreach ($galery as $item):?>
                <li><img src="images/<?php echo $item->img;?>" alt=""></li>
                <?php endforeach;?>
            </ul>
        </div>
        <?php else:?>
            <li><img src="images/<?php echo $products->img;?>" alt=""></li>
        <?php endif;?>
    </div>
    <?php
    $curr = \ishop\App::$app->getProperty('currency');
    $cats = \ishop\App::$app->getProperty('cats');
    ?>
    <div class="col-md-4 side-bar2">
        <div class="product-price">
            <div class="product-name">
                <h2><?php echo $products->title;?></h2>
                <p><?php echo $products->content;?></p>
                <?php if($products->old_price): ?>
                    <del class="del"><?php echo $curr['symbol_left'];?><?php echo $products->old_price * $curr['value'];?><?php echo$curr['symbol_right'];?></del>
                <?php endif; ?>
                <span id="base-price" data-base="<?php echo $products->price * $curr['value'];?>"><?php echo $curr['symbol_left']?><?php echo $products->price * $curr['value']?><?php echo $curr['symbol_right']?></span>
                <div class="clearfix"></div>
                <h4>AVAILABLE</h4>
            </div>
            <div class="product-id">
                <?php if($mods): ?>
                    <div class="available">
                        <h4>SELECT YOUR SIZE</h4>
                        <ul>
                            <li>
                                <select>
                                    <option>Выбрать размер</option>
                                    <?php foreach($mods as $mod):?>
                                        <option data-title="<?php echo $mod->title;?>" data-price="<?php echo $mod->price * $curr['value'];?>" value="<?php echo $mod->id;?>"><?php echo $mod->title;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </li>
                            <div class="clearfix"> </div>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="quantity">
                    <p>Выбрать количество:</p>
                    <input type="number" size="4" value="1" name="quantity" min="1" step="1">
                </div>
                <p>Category : <a href="category/<?php echo $cats[$products->category_id]['alias']?>"><?php echo $cats[$products->category_id]['title']?></a></p>
                <a id="productAdd" class="add-to-cart-link add" data-id="<?php echo $products->id;?>" href="/cart/add?id=<?php echo $products->id;?>">ADD TO BAG</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>


<!---->