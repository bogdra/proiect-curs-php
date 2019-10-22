<?php include_once('../../config.php'); ?>
<html>
    <?php include_once('login.php'); ?>
    <?php include_once('../../header.php'); ?>
    <body>
    <?php include_once('../../menu.php'); ?>
    <div class="container">
        <?php include_once('../../notification.php'); ?>
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Login</h5>
                        <form class="form-signin" action="#" method="POST">
                            <div class="form-label-group">
                                <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username" required autofocus>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Parola" required>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Intra</button>
                            <hr class="my-4">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>