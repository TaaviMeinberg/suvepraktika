<?php

require 'dbConfig.php';

$application_id;
$table_name;
$decision;
$summa;
$comment;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$application_id = $_POST['application_id'];
	$table_name = $_POST['table_name'];
	$decision = $_POST['decision'];
	$summa = $_POST['summa'];
	$comment = $_POST['comment'];
	
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $mysqli->prepare("INSERT INTO decision (application_id, table_name, decision, summa, comment) VALUES (?,?,?,?,?)");
	echo $mysqli->error;
    $stmt->bind_param("sssds", $application_id, $table_name, $decision, $summa, $comment);
	 if ($stmt->execute()){
      echo "\n Salvestatud!";
    } else {
      echo $user_email." \n Tekkis viga : " .$stmt->error;
    }
    $stmt->close();
    $mysqli->close();
}
	
