<?php

class TransactionController
{
    public function list()
    {
        $transactions = Transaction::readTransactions(FILES_PATH . 'sample_1.csv');

        require VIEWS_PATH . 'transactions.php';
    }
}
