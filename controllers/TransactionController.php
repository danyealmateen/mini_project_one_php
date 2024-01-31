<?php

class TransactionController
{
    public function list()
    {
        $transactionData = Transaction::readTransactions();
        require VIEWS_PATH . 'transactions.php';
    }
}
