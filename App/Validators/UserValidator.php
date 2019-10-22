<?php

function validate(): array
{
    $errors = [];

    if (!isset($_POST['username']) || strlen($_POST['username']) > 50 || strlen($_POST['username']) < 5) {
        $errors[] = 'The field name is not set right. Please review it';
    }
    if (!isset($_POST['name']) || strlen($_POST['name']) > 50 || strlen($_POST['name']) < 5) {
        $errors[] = 'The field name is not set right. Please review it';
    }
    if (!isset($_POST['email']) || strlen($_POST['email']) > 50 || strlen($_POST['email']) < 4) {
        $errors[] = 'The field email is not set right. Please review it';
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'The field email is not set right';
    }
    if (trim($_POST['password']) !== trim($_POST['password_again'])) {
        $errors[] = 'The password do not match';
    }
    if (!empty(getUserByUsername(trim($_POST['username'])))) {
        $errors[] = 'The username is already in use. Please choose another one.';
    }
    if (!empty(getUserByEmail(trim($_POST['email'])))) {
        $errors[] = 'The email is already in use. Please choose another one.';
    }

    return $errors;
}