<?php

include_once('../../App/Repository/User.php');
include_once('../../App/Services/Authentification.php');
include_once('../../App/Services/Notification.php');

if (isLoggedIn()) {
    header('Location:'. URL_ROOT);
}
if (!empty($_POST)) {
    if (!userLogin(trim($_POST['username']), trim($_POST['password']))) {
        pushNotifications(['The username and password does not match.']);
    } else {
        header('Location:'. URL_ROOT); exit;
    }
}