<?php

$db_config = require('config.php');
$db = new Database($db_config['database']);

// Get doctor from doctor table
$query_2 = "SELECT doctor.doctor_id, CONCAT(employee.first_name, ' ', employee.last_name) as doctor_name FROM employee INNER JOIN doctor ON employee.employee_id = doctor.employee_id;";
$doctors = $db->query($query_2)->get();

// Get referring_doctor from referring_doctor table
$query_3 = "SELECT referring_doctor.referring_doctor_id, CONCAT(referring_doctor.first_name, ' ', referring_doctor.last_name) as referring_doctor_name FROM referring_doctor;";
$referring_doctors = $db->query($query_3)->get();

// Get list of medications
$query_4 = "SELECT * FROM medication";
$medications = $db->query($query_4)->get();

// Get list of allergies
$query_5 = "SELECT * FROM allergy";
$allergies = $db->query($query_5)->get();

// Register new patient
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle nullable fields
    $address_1 = !empty($address_1) ? $address_1 : NULL;
    $address_2 = !empty($address_2) ? $address_2 : NULL;
    $city = !empty($city) ? $city : NULL;
    $province = !empty($province) ? $province : NULL;
    $postal_code = !empty($postal_code) ? $postal_code : NULL;
    $phone_number = !empty($phone_number) ? $phone_number : NULL;
    $email = !empty($email) ? $email : NULL;
    $doctor_id = !empty($doctor_id) ? $doctor_id : NULL;
    $referring_doctor_id = !empty($referring_doctor_id) ? $referring_doctor_id : NULL;


    $query_1 = "INSERT INTO `patient` (`patient_id`, `first_name`, `last_name`, `gender`, `date_of_birth`, `address_1`, `address_2`, `city`, `province`, `postal_code`, `phone_number`, `email`, `doctor_id`, `referring_doctor_id`) VALUES (NULL, :first_name, :last_name, :gender, :date_of_birth, :address_1, :address_2, :city, :province, :postal_code, :phone_number, :email, :doctor_id, :referring_doctor_id);";

    $db->query($query_1, [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'gender' => $_POST['gender'],
        'date_of_birth' => $_POST['date_of_birth'],
        'address_1' => $address_1,
        'address_2' => $address_2,
        'city' => $city,
        'province' => $province,
        'postal_code' => $postal_code,
        'phone_number' => $phone_number,
        'email' => $email,
        'doctor_id' => $doctor_id,
        'referring_doctor_id' => $referring_doctor_id
    ]);

    header("Location: /patients");
};


require VIEW_PATH . "patient-add.view.php";
