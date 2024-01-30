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

        /* .body {
            background-color: black;
            color: gray;
        } */
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
 

            //Hoppa över första raden i .csv filen pga rubrikerna

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