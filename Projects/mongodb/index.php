<?php
require 'vendor/autoload.php';
//$client = new MongoDB/Client("mongodb://localhost:3000");
$company = $client->company;
$result = $company->createCollection('employees');
var_dump($result);
?>