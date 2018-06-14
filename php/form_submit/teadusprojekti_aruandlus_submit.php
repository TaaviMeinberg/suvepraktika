<?php

require './../db/dbConfig.php';

$name;
$organization;
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
$m_type;
$planned_m;
$actual_m;
$additional_info;
$jsonTable;
$project_budget_total;
$requested_budget;
$budget_explanation;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_email = $_SESSION["userEmail"];
    $name = $_POST['name'];
    $organization = $_POST['organisation'];
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
    $actual_activities = $_POST['actual_activities'];
    $m_type = $_POST['m_type'];
    $planned_m = $_POST['planned_m'];
    $actual_m = $_POST['actual_m'];
    $additional_info = $_POST['additional_info'];
    $jsonTable = $_POST['jsonTable'];
    $project_budget_total = $_POST['project_budget_total'];
    $requested_budget = $_POST['requested_budget'];
    $budget_explanation = $_POST['budget_explanation'];

    $mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
    $stmt = $mysqli->prepare("INSERT INTO scientific_project_report (user_email, name, organization, code, phone, email, address, bank_account, report_compiler, project_manager, team_members, supervisor_name, supervisor_occupation, supervisor_field, project_name, initial_date, end_date, grant_awarded, actual_cost, problem, project_goal, expected_results, actual_results, planned_activities, actual_activities, m_type, planned_m, actual_m, additional_info, budget_table, budget_total, requested_budget, budget_explanation) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    echo $mysqli->error;
    $stmt->bind_param("ssissssssssssssssddsssssssssssdds", $user_email, $name, $organization, $id, $phone, $email, $address, $bank_acc, $report_compiler, $project_manager, $team_members, $supervisor_name, $supervisor_occupation, $field_of_activity, $project_name, $initial_date, $end_date, $grant_awarded, $actual_cost, $problem, $project_goal, $expected_results, $actual_results, $planned_activities, $actual_activities, $m_type, $planned_m, $actual_m, $additional_info, $jsonTable, $project_budget_total, $requested_budget, $budget_explanation);
    if ($stmt->execute()){
      echo "\n Salvestatud!";
    } else {
      echo $user_email." \n Tekkis viga : " .$stmt->error;
    }
    $stmt->close();
    $mysqli->close();
}
