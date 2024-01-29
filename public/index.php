<?php

declare(strict_types=1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

//define = definerar en konstant variabel, första arg = variabel namnet, arg2 = "bas" sökvägen till appen , arg3 app = namnet på katalogen, arg4 directory separator = motsvarar \ 
define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

require APP_PATH . 'App.php';

$transactionData = getTransactionData();

$totalAmount = 0;

foreach ($transactionData as $amount) {
    //ersätter dollartecken och kommatecken med en tom sträng!
    $cleanAmount = str_replace(['$', ','], '', $amount[3]);
    //konverterar strängen till numeriskt värde!
    $numericAmount = floatval($cleanAmount);

    $totalAmount += $numericAmount;
}

echo 'Total Amount:' . " " . $totalAmount;

// echo $totalAmount;

// //För all data
// foreach ($transactionData as $row) {
//     //implode används för att skapa en sträng av array elementen, tar två argument, en avgränsare och arrayen i sig.
//     echo implode(', ', $row) .  '<br>';
// }
