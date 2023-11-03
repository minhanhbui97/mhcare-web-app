<?php

require 'Database.php';

$db_config = require('config.php');

$query = "SELECT * FROM user";

$db = new Database($db_config['database']);

$users = $db->query($query)->fetchAll();

// dumpAndDie($users);


$usernames = array_column($users, 'username');



if (isset($_POST['username']) && isset($_POST['password'])) {    
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (in_array($username, $usernames)){
        $key = array_search($username, $usernames);

        $passwords = array_column($users, 'password');

        if ($password === $passwords[$key]){
            header("Location: /employee-workspace");
            exit();
        }
    }

    // TO DO: If username or password not match, show an error message

}

require VIEW_PATH . "login.view.php";

