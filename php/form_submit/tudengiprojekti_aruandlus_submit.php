<?php

require './../db/dbConfig.php';

function test_input($data){
	$data = trim($data); //eemaldab lõpust tühiku, tab vms
	$data = stripslashes($data); // eemaldab "\"
	$data = htmlspecialchars($data); // eemaldab keelatud märgid
	return $data;
  }

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
$used_grant_awarded;
$actual_cost;
$problem;
$project_goal;
$planned_results;
$actual_results;
$activity_list;
$planned_activities;
$actual_activities;
$additional_info;
$jsonTable;
$project_budget_total;
$requested_budget;
$budget_explanation;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$user_email = $_SESSION["userEmail"];
	$name = test_input($_POST['name']);
	$organization = test_input($_POST['organisation']);
	$id = test_input($_POST['id']);
	$phone = test_input($_POST['phone']);
	$email = test_input($_POST['email']);
	$address = test_input($_POST['address']);
	$bank_acc = test_input($_POST['bank_acc']);
	$report_compiler = test_input($_POST['report_compiler']);
	$project_manager = test_input($_POST['project_manager']);
	$team_members = test_input($_POST['team_members']);
	$project_name = test_input($_POST['project_name']);
	$initial_date = test_input($_POST['initial_date']);
	$end_date = test_input($_POST['end_date']);
	$grant_awarded = test_input($_POST['grant_awarded']);
	$used_grant_awarded = test_input($_POST['used_grant_awarded']);
	$actual_cost = test_input($_POST['actual_cost']);
	$problem = test_input($_POST['problem']);
	$project_goal = test_input($_POST['project_goal']);
	$planned_results = test_input($_POST['planned_results']);
	$actual_results = test_input($_POST['actual_results']);
	$activity_list = test_input($_POST['activity_list']);
	$planned_activities = test_input($_POST['planned_activities']);
	$actual_activities = test_input($_POST['actual_activities']);
	$additional_info = test_input($_POST['additional_info']);
	$jsonTable = $_POST['jsonTable'];
	$project_budget_total = test_input($_POST['project_budget_total']);
	$requested_budget = test_input($_POST['requested_budget']);
	$budget_explanation = test_input($_POST['budget_explanation']);

	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $mysqli->prepare("INSERT INTO student_project_report (user_email, name, organization, code, phone, email, address, bank_account, report_compiler, project_manager, team_members, project_name, initial_date, end_date, grant_awarded, used_grant_awarded, actual_cost, problem, project_goal, planned_results, actual_results, activity_list, planned_activities, actual_activities, additional_info, budget_table, budget_total, requested_budget, budget_explanation) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
	echo $mysqli->error;
	$stmt->bind_param("ssisssssssssssdddsssssssssdds", $user_email, $name, $organization, $id, $phone, $email, $address, $bank_acc, $report_compiler, $project_manager, $team_members, $project_name, $initial_date, $end_date, $grant_awarded, $used_grant_awarded, $actual_cost, $problem, $project_goal, $planned_results, $actual_results, $activity_list, $planned_activities, $actual_activities, $additional_info, $jsonTable, $project_budget_total, $requested_budget, $budget_explanation);
	if ($stmt->execute()){
		echo "\n Õnnestus!";
	} else {
		echo "\n Tekkis viga : " .$stmt->error;
	}
	$stmt->close();
	$mysqli->close();
}

 ?>
