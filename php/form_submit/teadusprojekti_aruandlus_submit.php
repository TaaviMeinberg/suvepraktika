<?php

require './php/db/dbConfig.php';
$name;
$id;
$phone;
$email;
$address;
$bank_acc;
$report_compiler;
$project_manager;
$team_members;
$supervisor_name;
$supervisor_occupation;
$field_of_activity;
$project_name;
$initial_date;
$end_date;
$grant_awarded;
$actual_cost;
$problem;
$project_goal;
$expected_results;
$actual_results;
$planned_activities;
$planned_m1;
$actual_m1;
$planned_m2;
$actual_m2;
$planned_m3;
$actual_m3;
$additional_info;
$jsonTable;
$project_budget_total;
$requested_budget;
$budget_explanation;
/*if (isset($_POST("name"))) {
echo "<script type='text/javascript'>alert('test');</script>";
}*/
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<script type='text/javascript'>alert('test');</script>";
    submitForm();
}

//echo "<script type='text/javascript'>alert('test');</script>";


function submitForm(){
  $name = $_POST['name'];
  $id = $_POST['id'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $bank_acc = $_POST['bank_acc'];
  $report_compiler = $_POST['report_compiler'];
  $project_manager = $_POST['project_manager'];
  $team_members = $_POST['team_members'];
  $supervisor_name = $_POST['supervisor_name'];
  $supervisor_occupation = $_POST['supervisor_occupation'];
  $field_of_activity = $_POST['field_of_activity'];
  $project_name = $_POST['project_name'];
  $initial_date = $_POST['initial_date'];
  $end_date = $_POST['end_date'];
  $grant_awarded = $_POST['grant_awarded'];
  $actual_cost = $_POST['actual_cost'];
  $problem = $_POST['problem'];
  $project_goal = $_POST['project_goal'];
  $expected_results = $_POST['expected_results'];
  $actual_results = $_POST['actual_results'];
  $planned_activities = $_POST['planned_activities'];
  $planned_m1 = $_POST['planned_m1'];
  $actual_m1 = $_POST['actual_m1'];
  $planned_m2 = $_POST['planned_m2'];
  $actual_m2 = $_POST['actual_m2'];
  $planned_m3 = $_POST['planned_m3'];
  $actual_m3 = $_POST['actual_m3'];
  $additional_info = $_POST['additional_info'];
  $jsonTable = $_POST['jsonTable'];
  $project_budget_total = $_POST['project_budget_total'];
  $requested_budget = $_POST['requested_budget'];
  $budget_explanation = $_POST['budget_explanation'];

  $mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);

  $stmt = $mysqli->prepare("INSERT INTO vp1users (firstname, lastname, birthday, gender, email, password) VALUES (?, ?, ?, ?, ?, ?)");
  echo $mysqli->error;

  $stmt->bind_param("siissssssssssssiisssssssssssssiis", $name, $id, $phone, $email, $address, $bank_acc, $report_compiler, $project_manager, $team_members, $supervisor_name, $supervisor_occupation, $field_of_activity, $project_name, $initial_date, $end_date, $grant_awarded, $actual_cost, $problem, $project_goal, $expected_results, $actual_results, $planned_activities, $planned_m1, $actual_m1, $planned_m2, $actual_m2, $planned_m3, $actual_m3, $additional_info, $jsonTable, $project_budget_total, $requested_budget, $budget_explanation);
  if ($stmt->execute()){
    echo "\n Õnnestus!";
  } else {
    echo "\n Tekkis viga : " .$stmt->error;
  }
  $stmt->close();
  $mysqli->close();
}
 ?>
