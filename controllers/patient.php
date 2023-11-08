<?php


$db_config = require('config.php');
$db = new Database($db_config['database']);


// Get patient info from patient table
$id = $_GET['id'];
$query_1 = "SELECT * FROM patient WHERE patient_id = :id";
$patient = $db->query($query_1,[':id' => $id])->find();

// Get doctor name from doctor table
$query_2 = "SELECT CONCAT(employee.first_name, ' ', employee.last_name) as doctor_name FROM employee INNER JOIN doctor ON employee.employee_id = doctor.employee_id INNER JOIN patient ON doctor.employee_id = patient.doctor_id WHERE patient.patient_id = :id;";
$doctor_name = $db->query($query_2,[':id' => $id])->find();

// Get referring_doctor name from referring_doctor table
$query_3 = "SELECT CONCAT(referring_doctor.first_name, ' ', referring_doctor.last_name) as referring_doctor_name FROM referring_doctor INNER JOIN patient ON patient.referring_doctor_id = patient.referring_doctor_id WHERE patient.patient_id = :id;";
$referring_doctor_name = $db->query($query_3,[':id' => $id])->find();
// dumpAndDie($referring_doctor_name); 


// Get list of medications

// Get list of allergies



// dumpAndDie($patient); 
// dumpAndDie($_POST) ;

require VIEW_PATH . "patient.view.php";
