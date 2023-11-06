<?php

$db_config = require('config.php');

$db = new Database($db_config['database']);


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $db->query("INSERT INTO `patient` (`id`, `first_name`, `last_name`) VALUES (NULL, :first_name, :last_name);", [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name']
    ]);
};

// dumpAndDie($_POST) ;

require VIEW_PATH . "patient-add.view.php";