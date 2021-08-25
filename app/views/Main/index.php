<div class="slider">
    <div class="callbacks_container">
        <ul class="rslides" id="slider">
            <li>
                <img src="images/bnr.jpg" alt="">
                <div class="banner-info">
                    <h3>FASHIONS</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. consectetur adipiscing elit. consectetur adipiscing elit.</p>
                </div>
            </li>
            <li>
                <img src="images/bnr2.jpg" alt="">
                <div class="banner-info">
                    <h3>MODELING</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. consectetur adipiscing elit. consectetur adipiscing elit.</p>
                </div>
            </li>
            <li>
                <img src="images/bnr3.jpg" alt="">
                <div class="banner-info">
                    <h3>FASHIONS</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. consectetur adipiscing elit. consectetur adipiscing elit.</p>
                </div>
            </li>
        </ul>
    </div>
</div>
<!---->
<div class="tab-section">
    <div class="wrap">
        <div id="horizontalTab">
                <!---tab1----->
                <?php if ($products):?>
                <?php $curr = \ishop\App::$app->getProperty('currency');?>
                <div>
                    <div class="course_demo1">
                        <div class="brand">
                            <h3>Товары в наличии</h3>
                        </div>
                        <ul id="flexiselDemo1">
                            <?php foreach ($products as $product):?>
                            <li class="g1">
                                <img src="images/<?php echo $product['img']?>" alt="" />
                                <a href="product/<?php echo $product['alias']?>"><div class="caption">
                                        <span></span>
                                        <h3><?php echo $product['title'];?></h3>
                                        <h5><?php echo $curr['symbol_left']?><?php echo $product['price'] * $curr['value'];?><?php echo $curr['symbol_right']?></h5>
                                    </div></a>
                                <div class="clearfix"></div>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>

                </div>
                <?php endif;?>
                <!---//tab1----->
        </div>
    </div>
</div>
<!---->