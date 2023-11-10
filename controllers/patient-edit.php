<?php


$db_config = require('config.php');
$db = new Database($db_config['database']);

// TO DO: missing columns

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

// Update current patient info
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    dumpAndDie($_POST);

    // Handle nullable fields
    $address_1 = !empty($_POST['address_1']) ? $_POST['address_1'] : NULL;
    $address_2 = !empty($_POST['address_2']) ? $_POST['address_2'] : NULL;
    $city = !empty($_POST['city']) ? $_POST['city'] : NULL;
    $province = !empty($_POST['province']) ? $_POST['province'] : NULL;
    $postal_code = !empty($_POST['postal_code']) ? $_POST['postal_code'] : NULL;
    $phone_number = !empty($_POST['phone_number']) ? $_POST['phone_number'] : NULL;
    $email = !empty($_POST['email']) ? $_POST['email'] : NULL;

    if ($_POST['doctor_id'] === "Select a doctor") {
        $doctor_id = NULL;
    } else {
        $doctor_id = $_POST['doctor_id'];
    }

    if ($_POST['referring_doctor_id'] === "Select a doctor") {
        $referring_doctor_id = NULL;
    } else {
        $referring_doctor_id = $_POST['referring_doctor_id'];
    }

    $query_1 = "UPDATE `patient` SET `first_name` = :first_name, `last_name` = :last_name, `gender` = :gender, `date_of_birth` = :date_of_birth, `address_1` = :address_1, `address_2` = :address_2, `city` = :city, `province` = :province, `postal_code` = :postal_code, `phone_number` = :phone_number, `email` = :email, `doctor_id` = :doctor_id, `referring_doctor_id` = :referring_doctor_id WHERE `patient`.`patient_id` = :patient_id;";

    // dumpAndDie($_POST);
    $db->query($query_1, [
        'patient_id' => $_POST['patient_id'],
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
        'referring_doctor_id' => $referring_doctor_id,
    ]);
    header("Location: /patients");
} else {
    $current_patient_id = $_GET['id'];
    $query_0 = "SELECT * FROM patient WHERE patient_id = :id";
    $patient = $db->query($query_0, [':id' => $current_patient_id])->find();

    // Find selected doctor_id
    $existing_doctor = $db->query("SELECT doctor.doctor_id, CONCAT(employee.first_name, ' ', employee.last_name) as doctor_name FROM employee INNER JOIN doctor ON employee.employee_id = doctor.employee_id INNER JOIN patient on doctor.doctor_id = patient.doctor_id WHERE patient_id = :id", ['id' => $current_patient_id])->find();

    if (!($existing_doctor)) {
        $existing_doctor = NULL;
    }

    // Find selected referring_doctor_id
    $existing_referring_doctor = $db->query("SELECT referring_doctor.referring_doctor_id, CONCAT(referring_doctor.first_name, ' ', referring_doctor.last_name) as referring_doctor_name FROM referring_doctor INNER JOIN patient on referring_doctor.referring_doctor_id = patient.referring_doctor_id WHERE patient_id = :patient_id", ['patient_id' => $current_patient_id])->find();

    if (!($existing_referring_doctor)) {
        $existing_referring_doctor = NULL;
    }

    // Get selected medications
    $query_6 = "SELECT medication_id FROM patient_medication WHERE patient_id = :patient_id";
    $existing_medications = $db->query($query_6, ['patient_id' => $current_patient_id])->get();
}

require VIEW_PATH . "patient-edit.view.php";
