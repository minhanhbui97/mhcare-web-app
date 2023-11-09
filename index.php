<?php

session_start();

require 'functions.php';
require 'Database.php';
require 'router.php';



// $db_config = require('config.php');

// $id = $_GET['id'];

// $query = "SELECT * FROM user where id = :id";

// $db = new Database($db_config['database']);

// $user = $db->query($query,[':id' => $id])->find(); // get 1 user where id is specified after url/?=$id

// dumpAndDie($user);



// $db_config = require('config.php');

// $query = "SELECT * FROM user";

// $db = new Database($db_config['database']);

// $users = $db->query($query)->get();

// dumpAndDie($users);

