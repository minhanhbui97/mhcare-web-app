<?php


$db_config = require('config.php');
$db = new Database($db_config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Delete patient's records in patient_medication table
    $query_1 = "DELETE FROM `patient_medication` WHERE `patient_medication`.`patient_id` = :patient_id;";
    $db->query($query_1, [
        'patient_id' => $_POST['patient_id']
    ]);

    // Delete patient's records in patient_allergy table
    $query_2 = "DELETE FROM `patient_allergy` WHERE `patient_allergy`.`patient_id` = :patient_id;";
    $db->query($query_2, [
        'patient_id' => $_POST['patient_id']
    ]);

    // Delete patient record in patient table
    $query_3 = "DELETE FROM `patient` WHERE `patient`.`patient_id` = :patient_id;";

    $db->query($query_3, [
        'patient_id' => $_POST['patient_id'],
    ]);

    header("Location: /patients");
}
