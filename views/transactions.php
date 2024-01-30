<!DOCTYPE html>
<html>

<head>
    <title>Transactions</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table tr th,
        table tr td {
            padding: 5px;
            border: 1px #eee solid;
        }

        tfoot tr th,
        tfoot tr td {
            font-size: 20px;
        }

        tfoot tr th {
            text-align: right;
        }

        .income-color {
            color: green;
        }

        .expense-color {
            color: red;
        }

        .body {
            background-color: black;
            color: gray;
        }

    </style>
</head>

<body class="body">
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Check #</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $transactions = readTransactions(FILES_PATH . 'sample_1.csv');
            $firstRow = true;
            $totalIncome = 0;
            $totalExpense = 0;

            //Hoppa över första raden i .csv filen pga rubrikerna
            foreach ($transactions as $transaction) {
                if ($firstRow) {
                    $firstRow = false;
                    continue;
                }
                //omvandlar transaktionerna till nummer (från sträng) och skapar ett totalbelopp
                if (isset($transaction[3])) {
                    $amountString = str_replace([',', '$'], '', $transaction[3]);
                    $amount = floatval($amountString);

                    //total amount
                    if ($amount > 0) {
                        $totalIncome += $amount;
                    }
                    //total expense
                    if ($amount < 0) {
                        $totalExpense -= $amount;
                    }

                    if ($totalIncome && $totalExpense) {
                        $netTotal = $totalIncome - $totalExpense;
                    }
                }
                //formaterad datum till m/d/y
                for ($i = 0; $i <= 3; $i++) {
                    // amount kolumnen
                    if ($i === 3 && isset($transaction[$i])) {
                        $amountString = str_replace([',', '$'], '', $transaction[$i]);
                        $amount = floatval($amountString);

                        //amount textfrg beroende på om större eller mindre än 0
                        $amountClass = $amount < 0 ? 'expense-color' : 'income-color';

                        echo "<td class='" . htmlspecialchars($amountClass) . "'>" . htmlspecialchars($transaction[$i]) . "</td>";
                    } elseif ($i !== 3 && isset($transaction[$i])) {
                        echo "<td>" . htmlspecialchars($transaction[$i]) . "</td>";
                    }
                }
                echo "</tr>";
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Income:</th>
                <td><?php echo htmlspecialchars(number_format($totalIncome, 2)); ?></td>
            </tr>
            <tr>
                <th colspan="3">Total Expense:</th>
                <td><?php echo "-" . htmlspecialchars(number_format($totalExpense, 2)); ?></td>
            </tr>
            <tr>
                <th colspan="3">Net Total:</th>
                <td><?php echo htmlspecialchars(number_format($netTotal, 2)); ?></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>