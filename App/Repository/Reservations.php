<?php

const CSV_FULL_PATH = PROJECT_ROOT . RESERVATIONS_FILE;

function addReservation( string $username , string $roomType, int $nights, string $paymentMethod, ?int $installmentsNumber = null)
{
    if ($handle = fopen(CSV_FULL_PATH, "a+")) {
        $lastIndex = getReservationsLastIndex();
        if ('full' == $paymentMethod)
            $installmentsNumber = 0;
        fputcsv($handle, [($lastIndex + 1), $username, $roomType, $nights, $paymentMethod, $installmentsNumber], DELIMITER);
        fclose($handle);
    } else {
        die('Could not open file Messages.csv. Please check permissions.');
    }
}

function getReservationsLastIndex(): int
{
    $reservations = getReservations();
    if (!empty($reservations)) {
        return (int)end($reservations)['id'];
    }
    return -1;
}

function getUserReservation(string $username)
{
    $results = [];
    foreach (getReservations() as $reservation) {
        if ($reservation['username'] === $username) {
            $results[] = $reservation ;
        }
    }
    return $results;
}

function getReservations(): array
{
    return csvToArray(CSV_FULL_PATH, DELIMITER);
}
