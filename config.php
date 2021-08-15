<?php


session_start();

include 'db.php';
// make a connection to mysql here
$options = [
    //required
    'username' => 'root',
    'database' => 'eservweb',
    //optional
    'password' => '',
    'type' => 'mysql',
    'charset' => 'utf8',
    'host' => 'localhost',
    'port' => '3306'
];
// print_r($_SESSION);
$db = new Database($options);