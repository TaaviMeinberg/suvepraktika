<?php
    session_start();
    require("dbConfig.php");
    $database = "if17_suvepraktika";

    $notice ="";
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $mysqli->prepare("SELECT ID, Name, Email FROM admins WHERE email = ? ");
	$stmt->bind_param("s", $_SESSION["userEmail"]);
	$stmt->bind_result($id, $name, $email);
    $stmt->execute();
    
    if($stmt->fetch()){
        echo "true";
        die;
    } else {
        echo "false";
        die;
    }
?>