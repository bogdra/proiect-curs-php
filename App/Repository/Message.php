<?php

const CSV_FULL_PATH = PROJECT_ROOT . MESSAGE_FILE;

function addMessage( $username = 'undefined', string $name, string $email, string $phone, string $source, string $message)
{
    if ($handle = fopen(CSV_FULL_PATH, "a+")) {
        $lastIndex = getMessageLastIndex();
        fputcsv($handle, [($lastIndex + 1),$username, $name, $email, $phone, $source, $message], DELIMITER);
        fclose($handle);
    } else {
        die('Could not open file Messages.csv. Please check permissions.');
    }
}

function getMessages(): array
{
    return csvToArray(CSV_FULL_PATH, DELIMITER);
}

function getMessageLastIndex(): int
{
    $messages = getMessages();
    if (!empty($messages)) {
        return (int)end($messages)['id'];
    }
    return -1;
}

function getUserMessages(string $username)
{
    $results = [];
    foreach (getMessages() as $message) {
        if ($message['username'] === $username) {
            $results[] = $message ;
        }
    }
    return $results;
}