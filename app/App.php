<?php

function readTransactions($path)
{
    $fileContent = file_get_contents($path);
    $rows = explode("\n", $fileContent);
    $transactions = [];

    foreach ($rows as $row) {
        $transactions[] = str_getcsv($row);
    }
    return  $transactions;
}
