<?php
    require("dbConfig.php");
    
    switch($_POST["action"]){
        case "listAllAdmins":
            listAllAdmins();
            break;
        case "removeAdmin":
            removeAdmin($_POST["adminID"]);
            break;
        //add case "addAdmin" which calls function addAdmin()
    }

    //all available methods
    function listAllAdmins(){
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
	    $mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
        $stmt = $mysqli->prepare("DELETE FROM admins WHERE ID = ?");
        $stmt->bind_param("s",$adminID);
        $stmt->execute();
    
        if(!$stmt){
            echo "Something went wrong";
        }
        $stmt->close();
    }
    // TO DO: add function addAdmin()
?>