<?php
include_once('template.php');
include_once('config/function.php');
require_once('config/koneksi.php');
top();
?>
    <div class="page-header" filter-color="orange">
        <div class="page-header-image" style="background-image:url(assets/img/login.jpg)"></div>
        <div class="container">
            <div class="col-md-4 content-center">
                <div class="card card-login card-plain">
                    <form class="form" method="POST" action="prosesl.php">
                        <div class="header header-primary text-center">
                            <div class="logo-container">
                                <img src="assets/img/now-logo.png" alt="">
                            </div>
                        </div>
                        <div class="content">
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons users_circle-08"></i>
                                </span>
                                <input type="number" class="form-control" name="nim" placeholder="ex. 1511xxxx">
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons objects_key-25"></i>
                                </span>
                                <input type="password" name="password" placeholder="password" class="form-control" />
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button class="btn btn-primary btn-round btn-lg btn-block" type="submit">Log In</button>
                        </div>
                        <div class="text-center">
                            <h6>
                                <a href="register.php" class="link">Create Account</a>
                            </h6>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php bot(); ?>
