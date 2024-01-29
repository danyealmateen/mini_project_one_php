<?php

declare(strict_types=1);

// Your Code
function getTransactionData()
{
    //berättar vart filen finns
    $filepath = '../transaction_files/sample_1.csv';
    //öppnar och läser - r = read
    $file = fopen($filepath, 'r');

    $data = [];
    //fgetcsv inbyggd funktion som tolkar och läser en rad från csv filen och returnerar en array fylld med alla tolkade rader. varje row = en rad/cell i csv-filen

    //FALSE kommer när slutet av filen är nådd eller om det blir fel
    while (($row = fgetcsv($file)) !== FALSE) {
        $data[] = $row;
    }
    //stänger ner filen
    fclose($file);
    return $data;
}


$transactionData = fopen('../transaction_files/sample_1.csv', 'r');
