<?php

declare(strict_types=1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

require APP_PATH . 'App.php';
require VIEWS_PATH . 'transactions.php';

$transactions = readTransactions(FILES_PATH . 'sample_1.csv');

$totalAmount = 0;

//Transaktioner
foreach ($transactions as $transaction) {
    if (isset($transaction[3])) {
        $formatedTransaction = str_replace([',', '$'], '', $transaction[3]);
        $totalAmount += floatval($formatedTransaction);
        // echo ($totalAmount . '<br>');
    } else {
        // echo "Ingen amount data";
    }
}

//Datum
foreach ($transactions as $transaction) {
    $originalDates = $transaction[0];
    $date = DateTime::createFromFormat("m/d/Y", $originalDates);
}
