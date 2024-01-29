<?php

function readTransactions($path)
{
    $fileContent = file_get_contents($path);
    echo $fileContent;
}
