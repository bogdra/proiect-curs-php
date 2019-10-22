<?php
include_once('../../config.php');
function validate(): array
{
    $errors = [];
    if (!isset($_POST['full_name']) || strlen($_POST['full_name']) > 50 || strlen($_POST['full_name']) < 4) {
        $errors[] = 'The field name is too short or too long. Please review it';
    }
    if (!isset($_POST['full_name']) || preg_match('/'.NAME_REGEX_RULE.'/',$_POST['full_name'],$match) !== 1 ){
        $errors[] = 'The field name contains invalid characters. Please review it';
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'The field email is not set right';
    }
    if (!isset($_POST['phone']) || preg_match('/'.PHONE_REGEX_RULE.'/',trim($_POST['phone']) ,$match)  !== 1 ){
        $errors[] = 'The field phone mut be between 9 and 10 digits .Please change it.';
    }
    if (!isset($_POST['source']) || !in_array(trim($_POST['source']), SOURCES) ){
        $errors[] = 'The sent source is not valid. Please resubmit the form with a valid one.';
    }
    if (!isset($_POST['message']) || strlen($_POST['message']) > 250 || strlen($_POST['message']) < 5) {
        $errors[] = 'The message does not fill the set requirements';
    }

    return $errors;
}