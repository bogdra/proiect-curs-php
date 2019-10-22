<?php
// Path of the current project
define('URL_ROOT', 'http://' . $_SERVER['SERVER_NAME'] . '/proiect');

//Path to the current project
define('PROJECT_ROOT', dirname(__FILE__, 1));

// Define the directory separator according to the operation system
define('DS', DIRECTORY_SEPARATOR);

// Define path to users persistence file
define('USERS_FILE', DS . 'App' . DS . 'Persistence' . DS . 'Users.csv');

// Define path to message persistence file
define('MESSAGE_FILE', DS . 'App' . DS . 'Persistence' . DS . 'Messages.csv');

//Define the sources options for Messages page
const SOURCES = [
    'Prieten',
    'Google',
    'Alte Surse'
];

// Define path to reservations persistence file
define('RESERVATIONS_FILE', DS . 'App' . DS . 'Persistence' . DS . 'Reservations.csv');

//Define the room options for Reservation page
const ROOM_TYPES = [
    'single',
    'double'
];

//Define the room options for Reservation page
const PAYMENT_OPTIONS = [
    'full',
    'installments'
];

//define the minimum and maximum installment rates
const NUMBER_OF_INSTALLMENTS = [
    'min' => 3,
    'max' => 12
];

//define the minimum and maximum installment rates
const NUMBER_OF_NIGHTS_AVAILABLE = [
    'min' => 1,
    'max' => 30
];


//Define the delimiter used for the CSV files
define('DELIMITER', ';');

//Regex rules to implement both in frontend an backend

define('PHONE_REGEX_RULE', '^(4)?0\d{9}$');
define('USERNAME_REGEX_RULE', '^[a-zA-Z]{1}[\w0-9_]{1,}$');
define('NAME_REGEX_RULE', '^[a-zA-Z]+([\', ]?[a-zA-Z]*)*$');

startSession();

function csvToArray($filename, $delimiter): array
{
    if (!file_exists($filename) || !is_readable($filename))
        return FALSE;

    $header = NULL;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== FALSE) {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
            if (!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);
        }
        fclose($handle);
    }
    return $data;
}

function startSession()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}