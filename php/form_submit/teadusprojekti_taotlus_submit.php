<?php

require './../db/dbConfig.php';
require './../db/formFunctions.php';

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
$m_type;
$m;
$reason;
$jsonTable;
$project_budget_total;
$requested_budget;
$budget_explanation;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_email = $_SESSION["userEmail"];
    $name = test_input($_POST['name']);
    $organization = test_input($_POST['organisation']);
	  $connection = test_input($_POST['connection']);
    $id = test_input($_POST['id']);
    $phone = test_input($_POST['phone']);
    $email = test_input($_POST['email']);
    $address = test_input($_POST['address']);
    $speciality = test_input($_POST['speciality']);
    $year = test_input($_POST['year']);
    $project_manager = test_input($_POST['project_manager']);
    $team_members = test_input($_POST['team_members']);
    $supervisor_name = test_input($_POST['supervisor_name']);
    $supervisor_occupation = test_input($_POST['supervisor_occupation']);
    $field_of_activity = test_input($_POST['field_of_activity']);
    $project_name = test_input($_POST['project_name']);
	  $requested_amount = test_input($_POST['requested_amount']);
    $initial_date = test_input($_POST['initial_date']);
    $end_date = test_input($_POST['end_date']);
    $requested_amount_goal = test_input($_POST['requested_amount_goal']);
    $problem = test_input($_POST['problem']);
    $project_goal = test_input($_POST['project_goal']);
    $results = test_input($_POST['results']);
    $activities = test_input($_POST['activities']);
    $m_type = test_input($_POST['m_type']);
    $m = test_input($_POST['m']);
    $reason = test_input($_POST['reason']);
	  $jsonTable = test_input($_POST['jsonTable']);
    $project_budget_total = test_input($_POST['project_budget_total']);
    $requested_budget = test_input($_POST['requested_budget']);
    $budget_explanation = test_input($_POST['budget_explanation']);

    $mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
    $stmt = $mysqli->prepare("INSERT INTO scientific_project_application (user_email, name, organization, connection, code, phone, email, address, speciality, degree, year, project_manager, team_members, supervisor_name, supervisor_occupation, field_of_activity, project_name, requested_amount, initial_date, end_date, requested_amount_goal, problem, project_goal, results, activities, m_type, m, reason, budget_table, budget_total, requested_budget, budget_explanation) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    echo $mysqli->error;
    $stmt->bind_param("ssisssssssissssssdsssssssssssdds", $user_email, $name, $organization, $connection, $id, $phone, $email, $address, $speciality, $degree, $year, $project_manager, $team_members, $supervisor_name, $supervisor_occupation, $field_of_activity, $project_name, $requested_amount, $initial_date, $end_date, $requested_amount_goal, $problem, $project_goal, $results, $activities, $m_type, $m, $reason, $jsonTable, $project_budget_total, $requested_budget, $budget_explanation);
    if ($stmt->execute()){
      echo "\n Salvestatud!";
    } else {
      echo "\n Tekkis viga : " .$stmt->error;
    }
    $stmt->close();
    $mysqli->close();
}
