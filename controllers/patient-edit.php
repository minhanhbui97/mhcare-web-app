<?php


$db_config = require('config.php');
$db = new Database($db_config['database']);

// Get doctor from doctor table
$query_2 = "SELECT doctor.doctor_id, CONCAT(employee.first_name, ' ', employee.last_name) as doctor_name FROM employee INNER JOIN doctor ON employee.employee_id = doctor.employee_id;";
$doctors = $db->query($query_2, [])->get();

// Get referring_doctor from referring_doctor table
$query_3 = "SELECT referring_doctor.referring_doctor_id, CONCAT(referring_doctor.first_name, ' ', referring_doctor.last_name) as referring_doctor_name FROM referring_doctor;";
$referring_doctors = $db->query($query_3, [])->get();

// Get list of medications
$query_4 = "SELECT * FROM medication";
$medications = $db->query($query_4, [])->get();

// Get list of allergies
$query_5 = "SELECT * FROM allergy";
$allergies = $db->query($query_5, [])->get();

// Update current patient info
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Transaction to handle series of queries
    try {
        $db->connection->beginTransaction();
        // Update patient table
        // Handle nullable fields
        $address_1 = !empty($_POST['address_1']) ? $_POST['address_1'] : NULL;
        $address_2 = !empty($_POST['address_2']) ? $_POST['address_2'] : NULL;
        $city = !empty($_POST['city']) ? $_POST['city'] : NULL;

        if ($_POST['province'] === "Select a province") {
            $province = NULL;
        } else {
            $province = $_POST['province'];
        }

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
        $db->statement->closeCursor();

        // Update patient_medication table
        if (isset($_POST["medication_check_list"])) {
            // Get selected medications
            $selected_medication_ids = $_POST["medication_check_list"];
            $s_medication_ids = array_map('intval', $selected_medication_ids); # cast from str to int

            // Get existing medications
            $query_10 = "SELECT medication_id FROM patient_medication WHERE patient_id = :patient_id;";
            $existing_medication_ids = $db->query($query_10, ['patient_id' => $_POST['patient_id']])->get(); # return array of associative array

            $e_medication_ids = array_map(function ($item) {
                return (int)$item['medication_id'];
            }, $existing_medication_ids); # return array of (int) ids

            foreach ($e_medication_ids as $e_medication_id) {
                // Delete existing medication_id if not in newly selected list
                if (!in_array($e_medication_id, $s_medication_ids)) {
                    $query_11 = "DELETE FROM `patient_medication` WHERE `patient_medication`.`patient_id` = :patient_id AND `patient_medication`.`medication_id` = :medication_id;";
                    $db->query($query_11, [
                        'patient_id' => $_POST['patient_id'],
                        'medication_id' => $e_medication_id
                    ]);
                    $db->statement->closeCursor();
                }
            }

            foreach ($s_medication_ids as $s_medication_id) {
                // Insert newly selected medication_id if not in existing lis
                if (!in_array($s_medication_id, $e_medication_ids)) {
                    $query_12 = "INSERT INTO `patient_medication` (`patient_id`, `medication_id`) VALUES (:patient_id, :medication_id);";
                    $db->query($query_12, [
                        'patient_id' => $_POST['patient_id'],
                        'medication_id' => $s_medication_id
                    ]);
                    $db->statement->closeCursor();
                }
            }
        } else {
            // If no item selected, then delete all patient's records
            $query_13 = "DELETE FROM `patient_medication` WHERE `patient_medication`.`patient_id` = :patient_id;";
            $db->query($query_13, [
                'patient_id' => $_POST['patient_id']
            ]);
            $db->statement->closeCursor();
        }

        // Update patient_allergy table
        if (isset($_POST["allergy_check_list"])) {
            // Get selected allergies
            $selected_allergy_ids = $_POST["allergy_check_list"];
            $s_allergy_ids = array_map('intval', $selected_allergy_ids); # cast from str to int

            // Get existing allergies
            $query_14 = "SELECT allergy_id FROM patient_allergy WHERE patient_id = :patient_id;";
            $existing_allergy_ids = $db->query($query_14, ['patient_id' => $_POST['patient_id']])->get(); # return array of associative arråay

            $e_allergy_ids = array_map(function ($item) {
                return (int)$item['allergy_id'];
            }, $existing_allergy_ids); # return array of (int) ids

            foreach ($e_allergy_ids as $e_allergy_id) {
                // Delete existing allergy_id if not in newly selected list
                if (!in_array($e_allergy_id, $s_allergy_ids)) {
                    $query_15 = "DELETE FROM `patient_allergy` WHERE `patient_allergy`.`patient_id` = :patient_id AND `patient_allergy`.`allergy_id` = :allergy_id;";
                    $db->query($query_15, [
                        'patient_id' => $_POST['patient_id'],
                        'allergy_id' => $e_allergy_id
                    ]);
                    $db->statement->closeCursor();
                }
            }

            foreach ($s_allergy_ids as $s_allergy_id) {
                // Insert newly selected allergy_id if not in existing list
                if (!in_array($s_allergy_id, $e_allergy_ids)) {
                    $query_16 = "INSERT INTO `patient_allergy` (`patient_id`, `allergy_id`) VALUES (:patient_id, :allergy_id);";
                    $db->query($query_16, [
                        'patient_id' => $_POST['patient_id'],
                        'allergy_id' => $s_allergy_id
                    ]);
                    $db->statement->closeCursor();
                }
            }
        } else {
            // If no item selected, then delete all patient's records
            $query_17 = "DELETE FROM `patient_allergy` WHERE `patient_allergy`.`patient_id` = :patient_id;";
            $db->query($query_17, [
                'patient_id' => $_POST['patient_id']
            ]);
            $db->statement->closeCursor();
        }

        $db->connection->commit();
    } catch (PDOException $e) {
        $db->connection->rollBack();
    }

    header("Location: /patients");
} else {
    $current_patient_id = $_GET['id'];

    $query_0 = "SELECT * FROM patient WHERE patient_id = :patient_id";
    $patient = $db->query($query_0, [':patient_id' => $current_patient_id])->find();

    // Find existing province
    $query_18 = "SELECT province FROM patient WHERE patient_id = :patient_id";
    $existing_province = $db->query($query_18, ['patient_id' => $current_patient_id])->find();

    // Find existing doctor_id
    $query_6 = "SELECT doctor.doctor_id, CONCAT(employee.first_name, ' ', employee.last_name) as doctor_name FROM employee INNER JOIN doctor ON employee.employee_id = doctor.employee_id INNER JOIN patient on doctor.doctor_id = patient.doctor_id WHERE patient_id = :patient_id";
    $existing_doctor = $db->query($query_6, ['patient_id' => $current_patient_id])->find();

    if (!($existing_doctor)) {
        $existing_doctor = NULL;
    }

    // Find existing referring_doctor_id
    $query_7 = "SELECT referring_doctor.referring_doctor_id, CONCAT(referring_doctor.first_name, ' ', referring_doctor.last_name) as referring_doctor_name FROM referring_doctor INNER JOIN patient on referring_doctor.referring_doctor_id = patient.referring_doctor_id WHERE patient_id = :patient_id;";
    $existing_referring_doctor = $db->query($query_7, ['patient_id' => $current_patient_id])->find();

    if (!($existing_referring_doctor)) {
        $existing_referring_doctor = NULL;
    }

    // Get existing medications
    $query_8 = "SELECT medication_id FROM patient_medication WHERE patient_id = :patient_id;";
    $existing_medication_ids = $db->query($query_8, ['patient_id' => $current_patient_id])->get();

    // Get existing allergies
    $query_9 = "SELECT allergy_id FROM patient_allergy WHERE patient_id = :patient_id;";
    $existing_allergie_ids = $db->query($query_9, ['patient_id' => $current_patient_id])->get();
}

require VIEW_PATH . "patient-edit.view.php";
