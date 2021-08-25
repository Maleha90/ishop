<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?php echo PATH ?>">Главная</a></li>
                <li>Корзина</li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="prdt">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-12">
                <div class="product-one cart">
                    <div class="register-top heading">
                        <h2>Оформление заказа</h2>
                    </div>
                    <br><br>
                    <?php if(!empty($_SESSION['cart'])):?>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>Фото</th>
                                    <th>Наименование</th>
                                    <th>Кол-во</th>
                                    <th>Цена</th>
                                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($_SESSION['cart'] as $id => $item): ?>
                                    <tr>
                                        <td><a href="product/<?php echo $item['alias'] ?>"><img src="images/<?php echo $item['img'] ?>" alt="<?php echo $item['title'] ?>"></a></td>
                                        <td><a href="product/<?php echo $item['alias'] ?>"><?php echo $item['title'] ?></a></td>
                                        <td><?php echo $item['qty'] ?></td>
                                        <td><?php echo $_SESSION['cart.currency']['symbol_left'] . $item['price'] . $_SESSION['cart.currency']['symbol_right']?></td>
                                        <td class="closed"><a href="/cart/delete/?id=<?php echo $id ?>"><span data-id="<?php echo $id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></a></td>
                                    </tr>
                                <?php endforeach;?>
                                <tr>
                                    <td>Итого:</td>
                                    <td colspan="4" class="text-right cart-qty"><?php echo $_SESSION['cart.qty'] ?></td>
                                </tr>
                                <tr>
                                    <td>На сумму:</td>
                                    <td colspan="4" class="text-right cart-sum"><?php echo  $_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . " {$_SESSION['cart.currency']['symbol_right']}" ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 reg-form">
                            <div class="reg">
                                <form method="post" action="cart/checkout" id="signup" role="form" data-toggle="validator">
                                    <?php if(!isset($_SESSION['user'])): ?>
                                    <ul class="form-group has-feedback">
                                        <li class="text-info">Login: </li>
                                        <li><input type="text" name="login" class="form-control" id="login" placeholder="Login" required value="<?php echo isset($_SESSION['form_data']['login']) ? h($_SESSION['form_data']['login']) : '';?>"></li>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </ul>
                                    <ul class="form-group has-feedback">
                                        <li class="text-info">Password: </li>
                                        <li><input type="password" name="password" class="form-control" id="password" placeholder="Password" data-error="Пароль должен включать не менее 6 символов" data-minlength="6" required value="<?php echo isset($_SESSION['form_data']['password']) ? h($_SESSION['form_data']['password']) : '';?>"></li>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </ul>
                                    <ul class="form-group has-feedback">
                                        <li class="text-info">Email: </li>
                                        <li><input for="email" type="email" name="email" class="form-control" id="email" placeholder="Email" required value="<?php echo isset($_SESSION['form_data']['email']) ? h($_SESSION['form_data']['email']) : '';?>"></li>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </ul>
                                    <ul class="form-group has-feedback">
                                        <li class="text-info">Name:</li>
                                        <li><input type="text" name="name" class="form-control" id="name" placeholder="Name" required value="<?php echo isset($_SESSION['form_data']['name']) ? h($_SESSION['form_data']['name']) : '';?>"></li>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </ul>
                                    <ul class="form-group has-feedback">
                                        <li class="text-info">Address:</li>
                                        <li><input type="text" name="address" class="form-control" id="address" placeholder="Address" required value="<?php echo isset($_SESSION['form_data']['address']) ? h($_SESSION['form_data']['address']) : '';?>"></li>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </ul>
                                    <input type="submit" value="Register Now">
                                    <?php endif;?>
                                    <ul class="form-group">
                                        <li for="address">Note</li>
                                        <textarea name="note" class="form-control"></textarea>
                                    </ul>
                                    <input type="submit" class="btn btn-default">
                                </form>
                                <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']);?>
                            </div>
                        </div>
                    <?php else: ?>
                        <h3>Корзина пуста...</h3>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product-end-->
