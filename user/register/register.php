<?php
include_once('../../config.php');
include_once('../../App/Repository/User.php');
include_once('../../App/Services/Authentification.php');
include_once('../../App/Services/Notification.php');
include_once('../../App/Validators/UserValidator.php');

if (isLoggedIn()) {
    header('Location:'. URL_ROOT);
}

if (!empty($_POST)) {
    sanitize();
    $errors = validate();
    if (count($errors) > 0) {
        pushNotifications($errors);
    } else {
        addUser(trim($_POST['username']), md5($_POST['password']), $_POST['email'], $_POST['name']);
        userLogin($_POST['username'], $_POST['password']);
        header("Location: ".URL_ROOT);
    }
}

function sanitize()
{
    $_POST['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $_POST['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
}
