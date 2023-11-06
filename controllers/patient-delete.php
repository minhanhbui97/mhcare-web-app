<?php


$db_config = require('config.php');
$db = new Database($db_config['database']);


// Delete selected patient info
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $query = "DELETE FROM `patient` WHERE `patient`.`id` = :id;";

    $db->query($query, [
        'id' => $_POST['patient_id'],
    ]);

    header("Location: /patients");
}
