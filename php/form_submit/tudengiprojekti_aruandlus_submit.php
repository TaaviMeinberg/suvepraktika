<?php

require './../db/dbConfig.php';

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
$used_grant_awarded;
$actual_cost;
$problem;
$project_goal;
$planned_results;
$actual_results;
$planned_activities;
$actual_activities;
$additional_info;
$jsonTable;
$project_budget_total;
$requested_budget;
$budget_explanation;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$user_email = $_SESSION["userEmail"];
	$name = $_POST['name'];
	$id = $_POST['id'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$bank_acc = $_POST['bank_acc'];
	$report_compiler = $_POST['report_compiler'];
	$project_manager = $_POST['project_manager'];
	$team_members = $_POST['team_members'];
	$project_name = $_POST['project_name'];
	$initial_date = $_POST['initial_date'];
	$end_date = $_POST['end_date'];
	$grant_awarded = $_POST['grant_awarded'];
	$used_grant_awarded = $_POST['used_grant_awarded'];
	$actual_cost = $_POST['actual_cost'];
	$problem = $_POST['problem'];
	$project_goal = $_POST['project_goal'];
	$planned_results = $_POST['planned_results'];
	$actual_results = $_POST['actual_results'];
	$planned_activities = $_POST['planned_activities'];
	$actual_activities = $_POST['actual_activities'];
	$additional_info = $_POST['additional_info'];
	$jsonTable = $_POST['jsonTable'];
	$project_budget_total = $_POST['project_budget_total'];
	$requested_budget = $_POST['requested_budget'];
	$budget_explanation = $_POST['budget_explanation'];

	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $mysqli->prepare("INSERT INTO student_project_report (user_email, name, code, phone, email, address, bank_account, report_compiler, project_manager, team_members, project_name, initial_date, end_date, grant_awarded, used_grant_awarded, actual_cost, problem, project_goal, planned_results, actual_results, planned_activities, actual_activities, additional_info, budget_table, budget_total, requested_budget, budget_explanation) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
	echo $mysqli->error;
	$stmt->bind_param("sssssssssssssdddssssssssdds", $user_email, $name,$id, $phone, $email, $aadress, $bank_acc, $report_compiler, $project_manager, $team_members, $project_name, $initial_date, $end_date, $grant_awarded, $used_grant_awarded, $actual_cost, $problem, $project_goal, $planned_results, $actual_results, $planned_activities, $actual_activities,$additional_info, $jsonTable, $project_budget_total, $requested_budget, $budget_explanation);
	if ($stmt->execute()){
		echo "\n Õnnestus!";
	} else {
		echo "\n Tekkis viga : " .$stmt->error;
	}
	$stmt->close();
	$mysqli->close();
}

 ?>
