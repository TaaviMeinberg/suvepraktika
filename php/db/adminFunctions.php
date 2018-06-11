<?php
    require("dbConfig.php");
    
    switch($_POST["action"]){
        case "listAllAdmins":
            listAllAdmins();
            break;
        case "removeAdmin":
            removeAdmin();
            break;
    }

    //all available methods
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
            echo '<button type="button" id="'.$id.'" class="btn btn-danger btn-sm" style="display: inline;" name="deleteAdmin">Kustuta</button>';
            echo '</center>';
        }
        $stmt->close();
    }
    function removeAdmin($adminID){
        $notice ="";
	    $mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
        $stmt = $mysqli->prepare("DELETE FROM admins WHERE ID == ?");
        $stmt->bind_param("s",$_POST["adminID"]);
        $stmt->execute();
    
        if($stmt->fetch()){
            
        }
        $stmt->close();
    }
?>