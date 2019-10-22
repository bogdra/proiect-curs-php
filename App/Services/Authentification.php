<?php

include_once('../Repository/User.php');

function userLogin(string $username, string $plainPassword): bool
{
    $user = getUserByUsername($username);
    if (isset($user)) {

        if (trim($username) === trim($user['username']) && md5($plainPassword) == $user['password']) {
            $_SESSION['username'] = trim($user['username']);
            $_SESSION['password'] = trim($user['password']);
            $_SESSION['full_name'] = trim($user['full_name']);
            $_SESSION['email'] = trim($user['email']);
            return true;
        }
    }
    return false;
}

function userLogout()
{
    session_destroy();
    header('Location: '.URL_ROOT);
}

function isLoggedIn()
{
    if (isset($_SESSION['username'])) {
        return true;
    }
    return false;
}