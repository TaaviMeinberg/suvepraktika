<?php

require './../db/dbConfig.php';

$name;
$connection;
$id;
$phone;
$email;
$address;
$speciality;
$degree;
$year;
$project_manager;
$team_members;
$supervisor_name;
$supervisor_occupation;
$field_of_activity;
$project_name;
$requested_amount;
$initial_date;
$end_date;
$requested_amount_goal;
$problem;
$project_goal;
$results;
$activities;
$m1;
$m2;
$m3;
$reason;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
	$connection = $_POST['connection']
    $id = $_POST['id'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $speciality = $_POST['speciality'];
    $year = $_POST['year'];
    $project_manager = $_POST['project_manager'];
    $team_members = $_POST['team_members'];
    $supervisor_name = $_POST['supervisor_name'];
    $supervisor_occupation = $_POST['supervisor_occupation'];
    $field_of_activity = $_POST['field_of_activity'];
    $project_name = $_POST['project_name'];
	$requested_amount = $_POST['requested_amount'];
    $initial_date = $_POST['initial_date'];
    $end_date = $_POST['end_date'];
    $requested_amount_goal = $_POST['requested_amount_goal']
    $problem = $_POST['problem'];
    $project_goal = $_POST['project_goal'];
    $results = $_POST['results'];
    $activities = $_POST['activities'];
    $m1 = $_POST['m1'];
    $m2 = $_POST['m2'];
    $m3 = $_POST['m3'];
	$reason = $_POST['reason'];

    $mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
    $stmt = $mysqli->prepare("INSERT INTO scientific_project_report (name, connection, code, phone, email, address, speciality, degree, year, project_manager, team_members, supervisor_name, supervisor_occupation, supervisor_field, project_name, requested_amount, initial_date, end_date, requested_amount_goal, problem, project_goal, results, activities, m1, m2, m3, reason) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    echo $mysqli->error;
    $stmt->bind_param("sssssssssssssssdsssssssssss", $name, $connection, $id, $phone, $email, $address, $speciality, $degree, $year, $project_manager, $team_members, $supervisor_name, $supervisor_occupation, $field_of_activity, $project_name, $requested_amount, $initial_date, $end_date, $requested_amount_goal, $problem, $project_goal, $results, $activities, $m1, $m2, $m3, $reason);
    if ($stmt->execute()){
      echo "\n Salvestatud!";
    } else {
      echo "\n Tekkis viga : " .$stmt->error;
    }
    $stmt->close();
    $mysqli->close();
}
