<?php
include_once 'config.php';

function pushNotifications(array $messages)
{
    startSession();
    foreach ($messages as $message) {
        $_SESSION['messages'][] = $message;
    }
}

function popNotifications(): array
{
    startSession();
    if (!isset($_SESSION['messages'])) {
        return [];
    }
    $temp = $_SESSION['messages'];
    unset($_SESSION['messages']);
    return $temp;
}

function hasNotifications(): bool
{
    if (PHP_SESSION_NONE == session_status() || !isset($_SESSION['messages']))
        return false;
    return true;
}