<?php

$name;
$id;
$phone;
$email;
$aadress;
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

//table




function submitForm(){

  //$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);

  $stmt = $mysqli->prepare("INSERT INTO vp1users (firstname, lastname, birthday, gender, email, password) VALUES (?, ?, ?, ?, ?, ?)");
  echo $mysqli->error;

  //$stmt->bind_param("sssiss", $signupFirstName, $signupFamilyName, $signupBirthDate, $gender, $signupEmail, $signupPassword);
  if ($stmt->execute()){
    echo "\n Õnnestus!";
  } else {
    echo "\n Tekkis viga : " .$stmt->error;
  }
  $stmt->close();
  $mysqli->close();
}
 ?>
