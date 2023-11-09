<?php

$db_config = require('config.php');
$db = new Database($db_config['database']);
// $id = $_GET['id'];

// Get doctor name from doctor table
$query_2 = "SELECT doctor.doctor_id, CONCAT(employee.first_name, ' ', employee.last_name) as doctor_name FROM employee INNER JOIN doctor ON employee.employee_id = doctor.employee_id;";
$doctors = $db->query($query_2)->get();

// // Get referring_doctor name from referring_doctor table
// $query_3 = "SELECT CONCAT(referring_doctor.first_name, ' ', referring_doctor.last_name) as referring_doctor_name FROM referring_doctor;";
// $referring_doctors = $db->query($query_3,[':id' => $id])->get();


// TO DO: missing columns
// TO DO: if else for nullable columns

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query_1 = "INSERT INTO `patient` (`patient_id`, `first_name`, `last_name`, `gender`, `date_of_birth`, `address_1`, `address_2`, `city`, `province`, `postal_code`, `phone_number`, `email`, `doctor_id`, `referring_doctor_id`) VALUES (NULL, :first_name, :last_name, :gender, :date_of_birth, :address_1, :address_2, :city, :province, :postal_code, :phone_number, :email, :doctor_id, NULL)";

    if (!$_POST['doctor_id']){
        $db->query($query_1, [
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
            'doctor_id' => $_POST['doctor_id'],
            // 'referring_doctor_id' => $_POST['referring_doctor_id']
        ]);
    }

    $db->query($query_1, [
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
        'doctor_id' => $_POST['doctor_id'],
        // 'referring_doctor_id' => $_POST['referring_doctor_id']
    ]);

    header("Location: /patients");
}
else{

}


;


require VIEW_PATH . "patient-add.view.php";
