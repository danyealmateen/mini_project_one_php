<?php

class Transaction
{
    public static function readTransactions($path)
    {
        $transactions = readTransactions(FILES_PATH . 'sample_1.csv');
        $firstRow = true;
        $totalIncome = 0;
        $totalExpense = 0;

        foreach ($transactions as $transaction) {
            if ($firstRow) {
                $firstRow = false;
                continue;
            }
            //omvandlar transaktionerna till nummer (från sträng) och skapar ett totalbelopp
            if (isset($transaction[3])) {
                $amountString = str_replace([',', '$'], '', $transaction[3]);
                $amount = floatval($amountString);

                if ($amount > 0) {
                    $totalIncome += $amount;
                }

                if ($amount < 0) {
                    $totalExpense -= $amount;
                }

                if ($totalIncome && $totalExpense) {
                    $netTotal = $totalIncome - $totalExpense;
                }
            }
            //formatera datum
            for ($i = 0; $i <= 3; $i++) {
                // amount kolumnen
                if ($i === 3 && isset($transaction[$i])) {
                    $amountString = str_replace([',', '$'], '', $transaction[$i]);
                    $amount = floatval($amountString);

                    //ternary för textfärgen
                    $amountClass = $amount < 0 ? 'expense-color' : 'income-color';

                    echo "<td class='" . htmlspecialchars($amountClass) . "'>" . htmlspecialchars($transaction[$i]) . "</td>";
                } elseif ($i !== 3 && isset($transaction[$i])) {
                    echo "<td>" . htmlspecialchars($transaction[$i]) . "</td>";
                }
            }
            echo "</tr>";
        }
    }
}
