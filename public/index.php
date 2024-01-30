<?php

declare(strict_types=1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

require APP_PATH . 'App.php';

$transactions = readTransactions(FILES_PATH . 'sample_1.csv');

foreach ($transactions as $transaction) {

    if (isset($transaction[3])) {
        print_r($transaction[3] . '<br>');
    } else {
        echo "Ingen amount data";
    }
    
}
