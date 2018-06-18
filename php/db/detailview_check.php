<?php
    require("dbConfig.php");
    $formId = $_POST["formId"];
    $tableName = $_POST["tableName"];
    detailview_check($formId,$tableName);

    function detailview_check($id, $table){
        $notice ="";
	    $mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	    $stmt = $mysqli->prepare("SELECT user_email  FROM ".$table." WHERE id = ? ") ;
	    $stmt->bind_param("i", $id);
	    $stmt->bind_result($email);
        $stmt->execute();
    
        if($stmt->fetch()){
            echo $email;
            die;
        } else {
            echo "false";
            die;
        }
    }  
?>