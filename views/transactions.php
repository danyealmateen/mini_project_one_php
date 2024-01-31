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
            <?php foreach ($transactionData['transactions'] as $transaction) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($transaction['date']); ?></td>

                    <td><?php echo htmlspecialchars($transaction['checkNumber']); ?></td>

                    <td><?php echo htmlspecialchars($transaction['description']); ?></td>

                    <td class="<?php echo htmlspecialchars($transaction['amountClass']); ?>">
                        <?php echo htmlspecialchars($transaction['amount']); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

        <tfoot>
            <tr>
                <th colspan="3">Total Income:</th>
                <td><?php echo htmlspecialchars(number_format($transactionData['totalIncome'], 2)) ?></td>
            </tr>
            <tr>
                <th colspan="3">Total Expense:</th>
                <td>-<?php echo htmlspecialchars(number_format($transactionData['totalExpense'], 2)) ?></td>
            </tr>
            <tr>
                <th colspan="3">Net Total:</th>
                <td><?php echo htmlspecialchars(number_format($transactionData['netTotal'], 2)) ?></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>