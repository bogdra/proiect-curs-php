<?php
include_once '../config.php';
include_once '../App/Repository/Reservations.php';
include_once '../App/Validators/ReservationValidation.php';
include_once '../App/Services/Authentification.php';
include_once '../App/Services/Notification.php';

if (!isLoggedIn()) {
    pushNotifications(['Pentru a putea face o rezervare, trebuie sa fiti inscrisi.']);
    header('Location: '.URL_ROOT.'/user/register/');
    exit();
}
$formSent = false;
if (!empty($_POST)) {
    sanitize();
    $errors = validate();
    if (count($errors) > 0) {
        pushNotifications($errors);
    } else {
        addReservation($_SESSION['username'], trim($_POST['room_type']), (int)($_POST['nights']), trim($_POST['payment']), (int)($_POST['number_of_installments']));
        $formSent = true;
//        header("Location: ".URL_ROOT.'/reservations/');
//        exit();
    }
}

function sanitize()
{
    $_POST['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $_POST['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
}
