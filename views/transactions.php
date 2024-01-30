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

            foreach ($transactions as $transaction) {
                if ($firstRow) {
                    $firstRow = false;
                    continue;
                }

                echo "<tr>";

                for ($i = 0; $i <= 3; $i++) {
                    if (isset($transaction[$i])) {
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
                <td><!-- YOUR CODE --></td>
            </tr>
            <tr>
                <th colspan="3">Total Expense:</th>
                <td><!-- YOUR CODE --></td>
            </tr>
            <tr>
                <th colspan="3">Net Total:</th>
                <td><!-- YOUR CODE --></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>