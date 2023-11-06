<?php

$db_config = require('config.php');
$db = new Database($db_config['database']);

$query = "SELECT * FROM patient";
$patients = $db->query($query)->get();


// dumpAndDie($users);

require VIEW_PATH . "patients.view.php";
