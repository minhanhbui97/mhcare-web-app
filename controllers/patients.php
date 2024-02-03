<?php

$db_config = require('config.php');
$db = new Database($db_config['database']);

$query = "SELECT * FROM patient ORDER BY patient.last_name, patient.first_name ";
$patients = $db->query($query)->get();


// dumpAndDie($users);

require VIEW_PATH . "patients.view.php";
