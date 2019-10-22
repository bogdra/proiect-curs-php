<?php
// Data Access Layer for User
const CSV_FULL_PATH = PROJECT_ROOT . USERS_FILE;


function deleteUserByUsername(string $username): void
{
    //delete user from csv file
}

function addUser(
    string $username,
    string $password,
    string $email,
    string $name,
    string $path_to_photo = 'undefined',
    string $role = 'user'
)
{
    if ($handle = fopen(CSV_FULL_PATH, "a+")) {
        $lastIndex = getUsersLastIndex();
        fputcsv($handle, [($lastIndex + 1), $username, $password, $email, $name, $path_to_photo, $role], DELIMITER);
        fclose($handle);
    } else {
        die('Could not open file Users.csv. Please check permissions.');
    }
}

function updateUserByUsername(string $username)
{
//    $user = findUserByUsername($username);
//    if $user
}

function getUserByUsername(string $username)
{
    foreach (getUsers() as $user) {
        if ($user['username'] == $username) {
            return $user;
        }
    }
    return [];
}

function getUserByEmail(string $email)
{
    foreach (getUsers() as $user) {
        if ($user['email'] == $email) {
            return $user;
        }
    }
    return [];
}

function getUsers(): array
{
    return csvToArray(CSV_FULL_PATH, DELIMITER);
}

function getUsersLastIndex(): int
{
    $users = getUsers();
    if (!empty($users)) {
        return end($users)['id'];
    }
    return -1;
}
