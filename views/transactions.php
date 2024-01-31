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

                    <td></td>
                    
                    <td></td>
                </tr>
            <?php endforeach; ?>
        </tbody>










        <tfoot>
            <tr>
                <th colspan="3">Total Income:</th>
            </tr>
            <tr>
                <th colspan="3">Total Expense:</th>
            </tr>
            <tr>
                <th colspan="3">Net Total:</th>
            </tr>
        </tfoot>
    </table>
</body>

</html>