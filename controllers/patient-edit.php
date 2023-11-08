<?php


$db_config = require('config.php');
$db = new Database($db_config['database']);
$query = "UPDATE `patient` SET `first_name` = :first_name, `last_name` = :last_name, `gender` = :gender, `date_of_birth` = :date_of_birth, `address_1` = :address_1, `address_2` = :address_2, `city` = :city, `province` = :province, `postal_code` = :postal_code, `phone_number` = :phone_number, `email` = :email WHERE `patient`.`patient_id` = :patient_id;";

// TO DO: missing columns


// Update current patient info
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $db->query($query, [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'gender' => $_POST['gender'],
        'date_of_birth' => $_POST['date_of_birth'],
        'address_1' => $_POST['address_1'],
        'address_2' => $_POST['address_2'],
        'city' => $_POST['city'],
        'province' => $_POST['province'],
        'postal_code' => $_POST['postal_code'],
        'phone_number' => $_POST['phone_number'],
        'email' => $_POST['email'],
        'patient_id' => $_POST['patient_id']
    ]);

    header("Location: /patients");

} 
else {
    $current_patient_id = $_GET['id'];
    $query = "SELECT * FROM patient WHERE patient_id = :id";
    $patient = $db->query($query,[':id' => $current_patient_id])->find();

}

require VIEW_PATH . "patient-edit.view.php";
