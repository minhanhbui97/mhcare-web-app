<?php

$db_config = require('config.php');
$db = new Database($db_config['database']);
$query = "INSERT INTO `patient` (`patient_id`, `first_name`, `last_name`, `gender`, `date_of_birth`, `address_1`, `address_2`, `city`, `province`, `postal_code`, `phone_number`, `email`, `doctor_id`, `referring_doctor_id`) VALUES (NULL, :first_name, :last_name, :gender, :date_of_birth, :address_1, :address_2, :city, :province, :postal_code, :phone_number, :email, NULL, NULL)";
// TO DO: missing columns

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        // 'doctor_id' => $_POST['doctor_id'],
        // 'referring_doctor_id' => $_POST['referring_doctor_id']
    ]);

    header("Location: /patients");
};


require VIEW_PATH . "patient-add.view.php";
