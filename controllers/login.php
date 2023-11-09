<?php

$db_config = require('config.php');
$db = new Database($db_config['database']);
$query = "SELECT * FROM employee";
$users = $db->query($query, [])->get();


$usernames = array_column($users, 'username');

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (in_array($username, $usernames)) {
        $key = array_search($username, $usernames);

        $passwords = array_column($users, 'password');

        if ($password === $passwords[$key]) {
            $_SESSION['user'] = [
                'username' => $username
            ];

            header("Location: /employee-workspace");
            exit();
        }
    } else {
        $_SESSION['_flash']['error_msg'] = "Invalid username or password. Please try again.";
        header("Location: /login");
        exit();
    }
}

// dumpAndDie($_SESSION);
require VIEW_PATH . "login.view.php";
