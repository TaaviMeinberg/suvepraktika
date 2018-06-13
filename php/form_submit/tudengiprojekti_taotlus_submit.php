<?php

require './../db/dbConfig.php';

$name;
$organization;
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
$project_name;
$requested_amount;
$budget;
$initial_date;
$end_date;
$requested_amount_goal;
$problem;
$project_goal;
$expected_results;
$activities;
$additional_info;
$jsonTable;
$project_budget_total;
$requested_budget;
$budget_explanation;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_email = $_SESSION["userEmail"];
    $name = $_POST['name'];
    $organization = $_POST['organisation'];
	  $connection = $_POST['connection'];
    $id = $_POST['id'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $speciality = $_POST['speciality'];
	  $degree = $_POST['degree'];
    $year = $_POST['year'];
    $project_manager = $_POST['project_manager'];
    $team_members = $_POST['team_members'];
    $project_name = $_POST['project_name'];
	  $requested_amount = $_POST['requested_amount'];
	  $budget = $_POST['budget'];
    $initial_date = $_POST['initial_date'];
    $end_date = $_POST['end_date'];
    $requested_amount_goal = $_POST['requested_amount_goal'];
    $problem = $_POST['problem'];
    $project_goal = $_POST['project_goal'];
    $expected_results = $_POST['expected_results'];
    $activities = $_POST['activities'];
    $additional_info = $_POST['additional_info'];
	  $jsonTable = $_POST['jsonTable'];
    $project_budget_total = $_POST['project_budget_total'];
    $requested_budget = $_POST['requested_budget'];
    $budget_explanation = $_POST['budget_explanation'];

    $mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
    $stmt = $mysqli->prepare("INSERT INTO student_project_application (user_email, name, organization, connection, code, phone, email, address, speciality, degree, year, project_manager, team_members, project_name, requested_amount, budget, initial_date, end_date, requested_amount_goal, problem, project_goal, results, activities, additional_info, budget_table, budget_total, requested_budget, budget_explanation) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    echo $mysqli->error;
    $stmt->bind_param("ssisssssssisssddsssssssssdds",$user_email, $name, $organization, $connection, $id, $phone, $email, $address, $speciality, $degree, $year, $project_manager, $team_members, $project_name, $requested_amount, $budget, $initial_date, $end_date, $requested_amount_goal, $problem, $project_goal, $expected_results, $activities, $additional_info, $jsonTable, $project_budget_total, $requested_budget, $budget_explanation);
    if ($stmt->execute()){
      echo "\n Salvestatud!";
    } else {
      echo "\n Tekkis viga : " .$stmt->error;
    }
    $stmt->close();
    $mysqli->close();
}
