<?php
include_once('update.php');

if (!isLoggedIn()) {
    header('Location:'. URL_ROOT);
}
$user = getUserByUsername($_SESSION['username']);
?>
<html>
    <?php include_once('../../header.php'); ?>
    <body>
    <?php include_once('../../menu.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Update User Profile</h5>
                        <form class="form-signin" action="#" method="POST">

                            <div class="form-label-group">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control" value="<?=$user['username']?>" placeholder="Username" minlength="4" maxlength="50" required autofocus>
                            </div>

                            <div class="form-label-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control"   value="<?=$user['email']?>" required minlength="4" maxlength="50" placeholder="Adresa de email" required>
                            </div>

                            <div class="form-label-group">
                                <label for="inputPassword">Parola</label>
                                <input type="password" id="inputPassword" name="password" class="form-control" required minlength="4" maxlength="50" placeholder="Parola" required>
                            </div>


                            <div class="form-label-group">
                                <label for="name">Nume</label>
                                <input type="text" id="name" name="name" class="form-control" required minlength="4" value="<?=$user['full_name']?>" maxlength="50" placeholder="Numele Complet" required>
                            </div>

                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Update</button>
                            <hr class="my-4">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('../../footer.php'); ?>
    </body>
</html>
