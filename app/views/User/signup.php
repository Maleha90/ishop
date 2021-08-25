<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?php echo PATH ?>">Главная</a></li>
                <li>Ркгистрация</li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<div class="registration-form">
    <div class="container">
        <h2>Registration</h2>
        <div class="col-md-6 reg-form">
            <div class="reg">
                <form method="post" action="user/signup" id="signup" role="form" data-toggle="validator">
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
                </form>
                <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']);?>
            </div>
        </div>
        <div class="col-md-6 reg-right">
            <h3>Completely Free Accouent</h3>
            <p>Pellentesque neque leo, dictum sit amet accumsan non, dignissim ac mauris. Mauris rhoncus, lectus tincidunt tempus aliquam, odio
                libero tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>
            <h3 class="lorem">Lorem ipsum dolor sit amet elit.</h3>
            <p>Tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>
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
