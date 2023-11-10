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
    // Transaction to handle series of queries
    try {
        $db->connection->beginTransaction();
        // Insert into patient table
        // Handle nullable fields
        $address_1 = !empty($_POST['address_1']) ? $_POST['address_1'] : NULL;
        $address_2 = !empty($_POST['address_2']) ? $_POST['address_2'] : NULL;
        $city = !empty($_POST['city']) ? $_POST['city'] : NULL;
        
        if ($_POST['province'] === "Select a province"){
            $province = NULL;
        }
        else{
            $province = $_POST['province'];
        }

        $postal_code = !empty($_POST['postal_code']) ? $_POST['postal_code'] : NULL;
        $phone_number = !empty($_POST['phone_number']) ? $_POST['phone_number'] : NULL;
        $email = !empty($_POST['email']) ? $_POST['email'] : NULL;

        if ($_POST['doctor_id'] === "Select a doctor"){
            $doctor_id = NULL;
        }
        else{
            $doctor_id = $_POST['doctor_id'];
        }

        if ($_POST['referring_doctor_id'] === "Select a doctor"){
            $referring_doctor_id = NULL;
        }
        else{
            $referring_doctor_id = $_POST['referring_doctor_id'];
        }


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
        $db->statement->closeCursor();
        $new_patient_id = $db->connection->lastInsertId();

        // Insert into patient_medication table
        $query_6 = "INSERT INTO `patient_medication` (`patient_id`, `medication_id`) VALUES (:patient_id, :medication_id);";
        if (isset($_POST['medication_check_list'])) {
            $selected_medication_ids = $_POST['medication_check_list'];
            foreach ($selected_medication_ids as $selected_medication_id) {
                $db->query($query_6, [
                    'patient_id' => $new_patient_id,
                    'medication_id' => $selected_medication_id
                ]);
                $db->statement->closeCursor();
            }
        }

        // Insert into patient_allergy table
        $query_7 = "INSERT INTO `patient_allergy` (`patient_id`, `allergy_id`) VALUES (:patient_id, :allergy_id);";
        if (isset($_POST['allergy_check_list'])) {
            $selected_allergy_ids = $_POST['allergy_check_list'];
            foreach ($selected_allergy_ids as $selected_allergy_id) {
                $db->query($query_7, [
                    'patient_id' => $new_patient_id,
                    'allergy_id' => $selected_allergy_id
                ]);
                $db->statement->closeCursor();
            }
        }

        $db->connection->commit();
    } catch (PDOException $e) {
        $db->connection->rollBack();
        dumpAndDie($e->getMessage());
    }
    header("Location: /patients");
};


require VIEW_PATH . "patient-add.view.php";
