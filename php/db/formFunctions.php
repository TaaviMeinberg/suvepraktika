<?php
    require("dbConfig.php");
    $user_email = $_SESSION["userEmail"];
    switch($_POST["action"]){
        case "listUserSubmissions":
            listScientificApplications($user_email);
            listScientificReports($user_email);
            listStudentReports($user_email);
            listStudentApplications($user_email);
            break;
        case "listAllSubmissions":
            listScientificApplications('%');
            listScientificReports('%');
            listStudentReports('%');
            listStudentApplications('%');
            break;
        case "markDeleted":
            markDeleted($_POST["tableName"],$_POST["entryID"]);
            break;
    }

    function listScientificApplications($email){
        $mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	    $stmt = $mysqli->prepare("SELECT id, date_created, project_name FROM scientific_project_application WHERE user_email like ? AND is_deleted = 0");
        $stmt->bind_param("s",$email);
        $stmt->bind_result($id, $creationDate, $projectName);
        $stmt->execute();
        
            while($stmt->fetch()){
                echo '<tr>';
                echo '<td>'. $creationDate .'</td>';
                echo '<td>Teadusprojekti taotlusdadasdass</td>';
                echo '<td>'. $projectName.'</td>';
				if ($email == '%') {
					echo (
						'<td>
							<button type="button" id="'.$id.',scientific_project_application" class="btn btn-secondary btn-sm" onclick="showDetailView()" name="detailView">Detailvaade</button>
							<button type="button" class="btn btn-info btn-sm" onclick="location.href=\'otsus.php\'">Langeta otsus</button>
						</td>'
				
					);
				} else{
					echo (
						'<td>
						<button  type="button" id="'.$id.',scientific_project_application" class="btn btn-danger btn-sm" name="markAsDeleted">Kustuta</button>
						<button type="button" id="'.$id.',scientific_project_application" class="btn btn-secondary btn-sm" onclick="showDetailView()" name="detailView">Detailvaade</button>
						</td>'
				
					);
				}
			
			}
        $stmt->close();
		
	}
    function listScientificReports($email){
        $mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	    $stmt = $mysqli->prepare("SELECT id, date_created, project_name FROM scientific_project_report WHERE user_email like ? AND is_deleted = 0");
        $stmt->bind_param("s",$email);
        $stmt->bind_result($id, $creationDate, $projectName);
        $stmt->execute();
        
            while($stmt->fetch()){
                echo '<tr>';
                echo '<td>'. $creationDate .'</td>';
                echo '<td>Teadusprojekti taotlus</td>';
                echo '<td>'. $projectName.'</td>';
				if ($email == '%') {
					echo (
						'<td>
							<button type="button" id="'.$id.',scientific_project_application" class="btn btn-secondary btn-sm" onclick="showDetailView()" name="detailView">Detailvaade</button>
							<button type="button" class="btn btn-info btn-sm" onclick="location.href=\'otsus.php\'">Langeta otsus</button>
						</td>'
				
					);
				} else{
					echo (
						'<td>
						<button  type="button" id="'.$id.',scientific_project_application" class="btn btn-danger btn-sm" name="markAsDeleted">Kustuta</button>
						<button type="button" id="'.$id.',scientific_project_application" class="btn btn-secondary btn-sm" onclick="showDetailView()" name="detailView">Detailvaade</button>
						</td>'
				
					);
				}
				
			}
        $stmt->close();
    }
    function listStudentApplications($email){
        $mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	    $stmt = $mysqli->prepare("SELECT id, date_created, project_name FROM student_project_application WHERE user_email like ? AND is_deleted = 0");
        $stmt->bind_param("s",$email);
        $stmt->bind_result($id,$creationDate, $projectName);
        $stmt->execute();
        while($stmt->fetch()){
                echo '<tr>';
                echo '<td>'. $creationDate .'</td>';
                echo '<td>Teadusprojekti taotlus</td>';
                echo '<td>'. $projectName.'</td>';
				if ($email == '%') {
					echo (
						'<td>
							<button type="button" id="'.$id.',scientific_project_application" class="btn btn-secondary btn-sm" onclick="showDetailView()" name="detailView">Detailvaade</button>
							<button type="button" class="btn btn-info btn-sm" onclick="location.href=\'otsus.php\'">Langeta otsus</button>
						</td>'
				
					);
				} else{
					echo (
						'<td>
						<button  type="button" id="'.$id.',scientific_project_application" class="btn btn-danger btn-sm" name="markAsDeleted">Kustuta</button>
						<button type="button" id="'.$id.',scientific_project_application" class="btn btn-secondary btn-sm" onclick="showDetailView()" name="detailView">Detailvaade</button>
						</td>'
				
					);
				}
				
			}
        $stmt->close();
    }
    function listStudentReports($email){
        $mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	    $stmt = $mysqli->prepare("SELECT id, date_created, project_name FROM student_project_report WHERE user_email like ? AND is_deleted = 0");
        $stmt->bind_param("s",$email);
        $stmt->bind_result($id, $creationDate, $projectName);
        $stmt->execute();
        
           while($stmt->fetch()){
                echo '<tr>';
                echo '<td>'. $creationDate .'</td>';
                echo '<td>Teadusprojekti taotlus</td>';
                echo '<td>'. $projectName.'</td>';
				if ($email == '%') {
					echo (
						'<td>
							<button type="button" id="'.$id.',scientific_project_application" class="btn btn-secondary btn-sm" onclick="showDetailView()" name="detailView">Detailvaade</button>
							<button type="button" class="btn btn-info btn-sm" onclick="location.href=\'otsus.php\'">Langeta otsus</button>
						</td>'
				
					);
				} else{
					echo (
						'<td>
						<button  type="button" id="'.$id.',scientific_project_application" class="btn btn-danger btn-sm" name="markAsDeleted">Kustuta</button>
						<button type="button" id="'.$id.',scientific_project_application" class="btn btn-secondary btn-sm" onclick="showDetailView()" name="detailView">Detailvaade</button>
						</td>'
				
					);
				}
				
			}
        $stmt->close();
    }
    function markDeleted($tableName,$id){
        $mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
        $stmt = $mysqli->prepare("UPDATE ".$tableName." SET is_deleted=1 WHERE id = ?");
        $stmt->bind_param("i", $id);
    
        if(!$stmt->execute()){
            echo "\n Tekkis viga : " .$stmt->error;
        }
        $stmt->close();
    }
	
	
?>