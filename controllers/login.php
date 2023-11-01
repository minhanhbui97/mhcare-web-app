<?php

if (isset($_POST['username']) && isset($_POST['password'])) {    
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username === 'test' && $password === 'test') {
        header("Location: /employee-workspace");
        exit();
    }
}

require VIEW_PATH . "login.view.php";

