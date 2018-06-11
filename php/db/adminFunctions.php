<?php
    require("dbConfig.php");

    function listAllAdmins(){
        $notice ="";
	    $mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	    $stmt = $mysqli->prepare("SELECT ID, Name, Email FROM admins");
	    $stmt->bind_result($id, $name, $email);
        $stmt->execute();
    
        while($stmt->fetch()){
            echo '<center>';
            echo '<br>';
            echo '<p style="display: inline;">'. $name .", ". $email.'</p>   ';
            echo '<button type="button" id="'.$id.'" class="btn btn-danger btn-sm" style="display: inline;">Kustuta</button>';
            echo '</center>';
        }
        $stmt->close();
    }
?>