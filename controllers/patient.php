<?php


$db_config = require('config.php');
$db = new Database($db_config['database']);

$id = $_GET['id'];
$query = "SELECT * FROM patient WHERE patient_id = :id";
$patient = $db->query($query,[':id' => $id])->find();


// dumpAndDie($patient); 
// dumpAndDie($_POST) ;

require VIEW_PATH . "patient.view.php";
