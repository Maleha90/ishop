<!DOCTYPE html>
<html>
<head>
    <base href="/">
    <link rel="shortcut icon" href="/public/images/cart.png" type="image/png" />
    <?php echo $this->getMeta();?>
    <link href="/public/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="/public/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="/public/megamenu/css/ionicons.min.css" rel='stylesheet' type='text/css' />
    <link href="/public/megamenu/css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="/public/css/flexslider.css" type="text/css" media="screen" />
    <!-- Custom Theme files -->
    <link href="/public/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="/public/css/my.css">
    <link rel="stylesheet" href="/public/css/flexslider.css" type="text/css" media="screen" />
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!--webfont-->
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
    <!---- tabs---->
    <link type="text/css" rel="stylesheet" href="/public/css/easy-responsive-tabs.css" />
    <!---- tabs---->

</head>
<!---->
<div class="header">
    <div class="container">
        <div class="header-left">
            <div class="menu-container">
                <div class="menu">
                    <?php new \app\widgets\Menu\Menu([
                       'tpl' => WIDGETS . '/Menu/menu_tpl/menu.php',
                    ]);?>
                </div>
            </div>
        </div>
        <div class="logo">
            <a href="<?php echo PATH;?>"><img src="images/logo.png" alt=""/></a>
        </div>
        <div class="header-right">
            <select class="dropdown" id="current" name="current">
                <?php new \app\widgets\Currency\Currency();?>
            </select>
            <div class="signin">
                <div class="cart-sec">
                    <a href="cart/show" onclick="getCart(); return false;"><img src="images/cart.png" alt=""/>
                    <?php if (!empty($_SESSION['cart'])):?>
                        <span class="sumcart"><?php echo$_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right'];?></span>
                    <?php else:?>
                        <span class="sumcart">0</span>
                    <?php endif;?>
                    </a>
                </div>
                <ul>
                    <?php if (!empty($_SESSION['user'])):?>
                        <li><a href="#"></a>Имя: <?php echo h($_SESSION['user']['name'])?></a> <span>/<span </li>
                        <li><a href="user/logout"> Выход</a></li>
                    <?php else:?>
                        <li><a href="user/signup">REGISTRATION</a> <span>/<span> &nbsp;</li>
                        <li><a href="user/login"> LOGIN</a></li>
                    <?php endif;?>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (isset($_SESSION['error'])):?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['error']; unset($_SESSION['error']);?>
                    </div>
                <?php endif;?>
                <?php if (isset($_SESSION['success'])):?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['success']; unset($_SESSION['success']);?>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
    <?php echo $content;?>
</div>

</head>
<body>
<div class="footer">
    <div class="container">
        <div class="social">
            <a href="#"><span class="icon1"></span></a>
            <a href="#"><span class="icon2"></span></a>
            <a href="#"><span class="icon3"></span></a>
            <a href="#"><span class="icon4"></span></a>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Корзина</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
                <a href="cart/view" type="button" class="order btn btn-primary">Оформить заказ</a>
                <button type="button" class="order btn btn-danger" onclick="clearCart()">Очистить корзину</button>
            </div>
        </div>
    </div>
</div>
<!---->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/public/js/jquery.min.js"></script>
<script src="/public/megamenu/js/vendor/jquery-1.12.0.min.js"></script>
<script src="/public/js/bootstrap.min.js"></script>
<script src="/public/js/bootstrap.js"></script>
<script src="/public/js/validator.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script type="text/javascript" src="/public/js/jquery.flexisel.js"></script>
<script src="/public/js/easyResponsiveTabs.js" type="text/javascript"></script>
<script src="/public/js/responsiveslides.min.js"></script>
<script type="text/javascript" src="/public/js/jquery.flexisel.js"></script>
<script src="/public/js/my.js"></script>
<script src="/public/megamenu/js/megamenu.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });

        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
    });
</script>
<script type="text/javascript">
    $(window).load(function() {
        $("#flexiselDemo1").flexisel({
            visibleItems: 5,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint:480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint:640,
                    visibleItems: 2
                },
                tablet: {
                    changePoint:768,
                    visibleItems: 3
                }
            }
        });

    });
</script>
<script>
    $(function () {
        $("#slider").responsiveSlides({
            auto: true,
            speed: 500,
            manualControls: '#slider3-pager',
        });
    });
</script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 1
        $("#slider2").responsiveSlides({
            auto: true,
            nav: true,
            speed: 500,
            namespace: "callbacks",
        });
    });
</script>
<?php $curr = \ishop\App::$app->getProperty('currency')?>
<script>
    let path = '<?php echo PATH;?>',
        course = <?php echo $curr['value']?>,
        symboleLeft = '<?php echo $curr['symbol_left']?>',
        symboleRight = '<?php echo $curr['symbol_right']?>',
        admin = '<?php echo ADMIN;?>'
</script>
</body>
</html>

