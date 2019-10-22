<?php
include_once('../config.php');
include_once ('../App/Services/Authentification.php');
include_once('../App/Repository/Message.php');
include_once('../App/Validators/MessageValidation.php');
include_once('../App/Services/Notification.php');

$formSent = false;

if (!empty($_POST)) {
    sanitize();
    $errors = validate();
    if (count($errors) > 0) {
        pushNotifications($errors);
    } else {
        addMessage(
            (isLoggedIn()) ? $_SESSION['username']: 'undefined',
            trim($_POST['full_name']),
            (isLoggedIn()) ? $_SESSION['email']: $_POST['email'],
            trim($_POST['phone']),
            trim($_POST['source']),
            trim($_POST['message'])
        );
        $formSent = true;
    }
}

function sanitize()
{
    $_POST['full_name'] = filter_input(INPUT_POST, 'full_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $_POST['phone'] = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
    $_POST['message'] = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
}