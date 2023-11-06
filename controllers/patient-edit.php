<?php


$db_config = require('config.php');
$db = new Database($db_config['database']);



// Update current patient info
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $query = "UPDATE `patient` SET `first_name` = :first_name, `last_name` = :last_name WHERE `patient`.`id` = :id;
    ";
    $db->query($query, [
        'id' => $_POST['patient_id'],
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
    ]);

    header("Location: /patients");

} 
else {
    $current_patient_id = $_GET['id'];
    $query = "SELECT * FROM patient WHERE id = :id";
    $patient = $db->query($query,[':id' => $current_patient_id])->find();

}

require VIEW_PATH . "patient-edit.view.php";
