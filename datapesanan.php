<?php
require'vendor/autoload.php';

$client = new MongoDB\Client;

$DataPesananBubur = $client->DataPesananBubur;

$result1 = $DataPesananBubur->createCollection('buburayam');
var_dump($result1);
?>