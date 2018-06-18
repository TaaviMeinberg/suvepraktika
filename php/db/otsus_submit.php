<?php

require 'dbConfig.php';

$application_id;
$form_name;
$decision;
$amount;
$comment;
$prePaid;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$application_id = $_POST['application_id'];
	$form_name = $_POST['form_name'];
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	switch($_POST["action"]){
			case "saveDecision":
				$decision = $_POST['decision'];
				$amount = $_POST['amount'];
				$comment = $_POST['comment'];
				$prePaid = $_POST['prePaid'];

					$stmt = $mysqli->prepare("INSERT INTO decision (application_id, form_name, decision, summa, comment, prePaid) VALUES (?,?,?,?,?,?)");
					echo $mysqli->error;
				    $stmt->bind_param("sssdss", $application_id, $form_name, $decision, $amount, $comment, $prePaid);
					 if ($stmt->execute()){
				      echo "\n Salvestatud!";
				    } else {
				      echo $user_email." \n Tekkis viga : " .$stmt->error;
				    }
				break;
				case "askDecision":

						$stmt = $mysqli->prepare("SELECT decision, confirmed, summa, comment, prePaid FROM decision WHERE application_id like ? AND form_name like ?");
						$stmt->bind_param("is", $application_id, $form_name);
						$stmt->bind_result($decision, $confirmed, $amount, $comment, $prePaid);
						$stmt->execute();
						if($stmt->fetch()){
							echo $decision.", ".$confirmed.", ".$amount.", ".$comment.", ".$prePaid;
						} else {
							echo "";
						}
	  		break;
				case "saveConfirmation":
						$confirmed= $_POST['confirm_date'];
						$prePaid = $_POST['prePaid'];
						$stmt = $mysqli->prepare("UPDATE decision SET confirmed=?, prePaid=? WHERE application_id like ? AND form_name like ?");
						$stmt->bind_param("ssis",$confirmed, $prePaid ,$application_id, $form_name);
						if ($stmt->execute()){
							 echo "\n Salvestatud!";
						 } else {
							 echo $user_email." \n Tekkis viga : " .$stmt->error;
						 }
				break;
			}
			$stmt->close();
			$mysqli->close();
}
