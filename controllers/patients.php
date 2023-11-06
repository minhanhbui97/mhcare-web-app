<?php



$db_config = require('config.php');

$query = "SELECT * FROM patient";

$db = new Database($db_config['database']);

$patients = $db->query($query)->get();

// dumpAndDie($users);

require VIEW_PATH . "patients.view.php";