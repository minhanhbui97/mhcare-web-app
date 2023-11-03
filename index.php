<?php


require 'functions.php';
require 'router.php';
require 'Database.php';

$config = require('config.php');

// $query = "SELECT * FROM user";

$id = $_GET['id'];
$query = "SELECT * FROM user where id = :id";

$db = new Database($config['database']);

// $users = $db->query($query)->fetchAll();

$user = $db->query($query,[':id' => $id])->fetch(); // get 1 user where id is specified after url/?=$id

// dumpAndDie($users);

dumpAndDie($user);

