<?php


require 'functions.php';
require 'router.php';


// Connect to DB 

// data source name
$dsn = "mysql:host=localhost;port=3306;dbname=myapp;user=root;charset=utf8mb4";
$pdo = new PDO($dsn);

$statement = $pdo->prepare("SELECT * FROM user");

$statement->execute();

$users = $statement->fetchAll(PDO::FETCH_ASSOC);

dumpAndDie($users);