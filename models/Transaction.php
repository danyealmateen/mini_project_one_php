<?php
class Transaction
{
    public static function readTransactions()
    {
        $transactionsRaw = readTransactions(FILES_PATH . 'sample_1.csv');
        $transactionsProcessed = [];
        $totalIncome = 0;
        $totalExpense = 0;
        $firstRow = true;

        foreach ($transactionsRaw as $transaction) {
            if ($firstRow) {
                $firstRow = false;
                continue;
            }
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
                    $totalIncome - $totalExpense;
                }
            }
            //formatera datum
            $date = DateTime::createFromFormat('d/m/Y', $transaction[0]);
            $formattedDate = $date ? $date->format('M j, Y') : 'Ogiltigt datum';

            for ($i = 0; $i <= 3; $i++) {
                // amount kolumnen
                if ($i === 3 && isset($transaction[$i])) {
                    $amountString = str_replace([',', '$'], '', $transaction[$i]);
                    $amount = floatval($amountString);
                    //color-klass för amounten
                    $amountClass = $amount < 0 ? 'expense-color' : 'income-color';

                    $transactionsProcessed[] = [
                        'date' => $formattedDate,
                        'checkNumber' => $transaction[1],
                        'description' => $transaction[2],
                        'amount' => $amount,
                        'amountClass' => $amountClass
                    ];
                } elseif ($i !== 3 && isset($transaction[$i])) {
                }
            }
        }
        return [
            'transactions' => $transactionsProcessed,
            'totalIncome' => $totalIncome,
            'totalExpense' => $totalExpense,
            'netTotal' => $totalIncome - $totalExpense
        ];
    }
}
