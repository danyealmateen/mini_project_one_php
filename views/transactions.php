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
    </style>
</head>

<body>
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

                    if ($amount > 0) {
                        $totalIncome += $amount;
                    }

                    if ($amount < 0) {
                        $totalExpense -= $amount;
                    }
                }



                //formaterad datum till m/d/y
                for ($i = 0; $i <= 3; $i++) {
                    //omn index är lika med 0 och indexnumret finns som nyckeln i arrayen...
                    if ($i === 0 && isset($transaction[$i])) {
                        $originalDate = $transaction[$i];
                        $dateObject = DateTime::createFromFormat("m/d/Y", $originalDate);

                        if ($dateObject !== false) {
                            $formattedDate = $dateObject->format("M j, Y");
                            echo "<td>" . htmlspecialchars($formattedDate) . "</td>";
                        } else {
                            echo "<td> Ogiltigt datum </td>";
                        }
                    } elseif ($i !== 0 && isset($transaction[$i])) {
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
                <td><!-- YOUR CODE --></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>