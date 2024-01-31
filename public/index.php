<?php

declare(strict_types=1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);
define('MODELS_PATH', $root . 'models' . DIRECTORY_SEPARATOR);
define('CONTROLLERS_PATH', $root . 'controllers' . DIRECTORY_SEPARATOR);

require APP_PATH . 'App.php';
require MODELS_PATH . 'Transaction.php';
require CONTROLLERS_PATH . 'TransactionController.php';

$controller = new TransactionController();
$controller->list();
