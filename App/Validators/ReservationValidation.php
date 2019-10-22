<?php
include_once('../../config.php');
function validate(): array
{
    $errors = [];
    if (!isset($_POST['room_type']) || !in_array(trim($_POST['room_type']), ROOM_TYPES) ){
        $errors[] = 'The room type is not valid. Please resubmit the form with a valid one.';
    }
    if (!isset($_POST['nights']) || (int)$_POST['nights'] < NUMBER_OF_NIGHTS_AVAILABLE['min'] || (int)$_POST['nights'] > NUMBER_OF_NIGHTS_AVAILABLE['max']){
        $errors[] = 'The field nights is invalid. Please review it.';
    }
    if (!isset($_POST['payment']) || !in_array(trim($_POST['payment']), PAYMENT_OPTIONS) ){
        $errors[] = 'The payment type is not valid. Please resubmit the form with a valid one.';
    }
    if (isset($_POST['payment']) && trim($_POST['payment']) === 'installments'){
        if ((int)($_POST['number_of_installments']) < NUMBER_OF_INSTALLMENTS['min'] || (int)($_POST['number_of_installments']) > NUMBER_OF_INSTALLMENTS['max'] ) {
            $errors[] = 'The number of installments field must be between '.NUMBER_OF_INSTALLMENTS['min'].' and '.NUMBER_OF_INSTALLMENTS['max'].'.';
        }
    }
//    var_dump($errors); die;
    return $errors;
}