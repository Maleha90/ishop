<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?php echo PATH ?>">Главная</a></li>
                <li>Авторегестрация</li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<div class="login">
    <div class="container">
        <h2>Login</h2>
        <div class="col-md-6 reg-form">
            <div class="reg">
                <form method="post" action="user/login" id="signup" role="form" data-toggle="validator">
                    <ul class="form-group has-feedback">
                        <li class="text-info">Login: </li>
                        <li><input type="text" name="login" class="form-control" id="login" placeholder="Login" required></li>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </ul>
                    <ul class="form-group has-feedback">
                        <li class="text-info">Password: </li>
                        <li><input type="password" name="password" class="form-control" id="password" placeholder="Password" data-error="Пароль должен включать не менее 6 символов" data-minlength="6" required></li>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </ul>
                    <input type="submit" value="Login">
                </form>
            </div>
        </div>
        <div class="col-md-6 login-right">
            <h3>NEW REGISTRATION</h3>
            <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
            <a class="acount-btn" href="user/signup">Create an Account</a>
        </div>
        <div class="clearfix"></div>

        <div class="navigation">
            <ul>
                <li><a href="about.html">ABOUT</a></li>
                <li><a href="woman.html">STOCKITS</a></li>
                <li><a href="contact.html">CONTACT</a></li>
                <li><a href="man.html">STORE</a></li>
                <li><a href="terms.html">TERMS & CONDITION</a></li>
                <li><a href="man.html">SHOW TO BUY</a></li>
                <li><a href="404.html">SHIPPING</a></li>
                <li><a href="404.html">RETURNS</a></li>
                <li><a href="single.html">SIZE CHART</a></li>
            </ul>
        </div>
    </div>
</div>
<!---->
