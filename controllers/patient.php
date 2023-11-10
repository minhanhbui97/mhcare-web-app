<?php


$db_config = require('config.php');
$db = new Database($db_config['database']);

$patient_id = $_GET['id'];

// Get patient info from patient table
$query_1 = "SELECT * FROM patient WHERE patient_id = :patient_id;";
$patient = $db->query($query_1, ['patient_id' => $patient_id])->find();

// Get doctor name from doctor table
$query_2 = "SELECT CONCAT(employee.first_name, ' ', employee.last_name) as doctor_name FROM employee INNER JOIN doctor ON employee.employee_id = doctor.employee_id INNER JOIN patient ON doctor.doctor_id = patient.doctor_id WHERE patient.patient_id = :patient_id;";
$doctor_name = $db->query($query_2, ['patient_id' => $patient_id])->find();

if (!$doctor_name) {
    $doctor_name['doctor_name'] = "";
}

// Get referring_doctor name from referring_doctor table
$query_3 = "SELECT CONCAT(referring_doctor.first_name, ' ', referring_doctor.last_name) as referring_doctor_name FROM referring_doctor INNER JOIN patient ON referring_doctor.referring_doctor_id = patient.referring_doctor_id WHERE patient.patient_id = :patient_id;";
$referring_doctor_name = $db->query($query_3, ['patient_id' => $patient_id])->find();

if (!$referring_doctor_name) {
    $referring_doctor_name['referring_doctor_name'] = "";
}

// Get list of medications
$query_4 = "SELECT * FROM medication";
$medications = $db->query($query_4, [])->get();

// Get list of allergies
$query_5 = "SELECT * FROM allergy";
$allergies = $db->query($query_5, [])->get();

// Get existing medications
$query_6 = "SELECT medication_id FROM patient_medication WHERE patient_id = :patient_id;";
$existing_medication_ids = $db->query($query_6, ['patient_id' => $patient_id])->get();

// Get existing allergies
$query_7 = "SELECT allergy_id FROM patient_allergy WHERE patient_id = :patient_id;";
$existing_allergie_ids = $db->query($query_7, ['patient_id' => $patient_id])->get();


require VIEW_PATH . "patient.view.php";
