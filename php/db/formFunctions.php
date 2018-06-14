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
        case "detailed_content":
            $formId = $_POST["formId"];
            $tableName = $_POST["tableName"];
            showDetailedContent($formId, $tableName);
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
                echo '<td>Teadusprojekti taotlus</td>';
                echo '<td>'. $projectName.'</td>';
                echo '<td>
                <button type="button" id="'.$id.',scientific_project_application" class="btn btn-danger btn-sm" name="markAsDeleted">Kustuta</button>
                <button type="button" id="'.$id.',scientific_project_application" class="btn btn-secondary btn-sm" onclick="showDetailView()" name="detailView">Detailvaade</button>
                </td>';
                echo '</tr>';
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
                echo '<td>Teadusprojekti aruanne</td>';
                echo '<td>'. $projectName.'</td>';
                echo '<td>
                <button type="button" id="'.$id.',scientific_project_report" class="btn btn-danger btn-sm" name="markAsDeleted">Kustuta</button>
                <button type="button" id="'.$id.',scientific_project_application" class="btn btn-secondary btn-sm" onclick="showDetailView()" name="detailView">Detailvaade</button>
                </td>';
                echo '</tr>';
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
                echo '<td>Tudengiprojekti taotlus</td>';
                echo '<td>'. $projectName.'</td>';
                echo '<td>
                <button type="button" id="'.$id.',student_project_application" class="btn btn-danger btn-sm" name="markAsDeleted">Kustuta</button>
                <button type="button" id="'.$id.',scientific_project_application" class="btn btn-secondary btn-sm" onclick="showDetailView()" name="detailView">Detailvaade</button>
                </td>';
                echo '</tr>';
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
                echo '<td>Tudengiprojekti aruanne</td>';
                echo '<td>'. $projectName.'</td>';
                echo '<td>
                <button type="button" id="'.$id.',student_project_report" class="btn btn-danger btn-sm" name="markAsDeleted">Kustuta</button>
                <button type="button" id="'.$id.',scientific_project_application" class="btn btn-secondary btn-sm" onclick="showDetailView()" name="detailView">Detailvaade</button>
                </td>';
                echo '</tr>';
            }
        $stmt->close();
    }
    function showDetailedContent($id, $table) {
      $mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
      $stmt = $mysqli->prepare("SELECT * FROM ".$table." WHERE id like ?");
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $result = $stmt->get_result();
      $num_of_rows = $result->num_rows;
      while ($row = $result->fetch_assoc()) {

        switch($table){
            case "scientific_project_application":
                echo '<p><b>ID: </b>'.$row['id'].'</p>';
                echo '<p><b>Saatja E-mail: </b>'.$row['user_email'].'</p>';
                echo '<p><b>Koostatud: </b>'.$row['date_created'].'</p>';
                if ($row['organization']==0) {
                  echo '<p><b>Nimi: </b>'.$row['name'].'</p>';
                  echo '<p><b>Taotleja isikukood: </b>'.$row['code'].'</p>';
                } else {
                  echo '<p><b>Organisatsioon: </b>'.$row['name'].'</p>';
                  echo '<p><b>Organisatsiooni registrikood: </b>'.$row['code'].'</p>';
                  echo '<p><b>Organisatsiooni seos tudengi ja ülikooliga: </b>'.$row['connection'].'</p>';
                }
                echo '<p><b>Taotleja kontaktandmed: </b></p><table border="1"><tr><th>Telefoninumber</th><th>E-posti aadress</th><th>Elukoha aadress</th></tr><tr><th>'.$row['phone'].'</th><th>'.$row['email'].'</th><th>'.$row['address'].'</th></tr></table><br>';
                echo '<p><b>Õppeinfo: </b></p><table border="1"><tr><th>Eriala</th><th>Õppetase</th><th>Õppeaasta</th></tr><tr><th>'.$row['speciality'].'</th><th>'.$row['degree'].'</th><th>'.$row['year'].'</th></tr></table><br>';
                echo '<p><b>Teised projektimeeskonna liikmed: </b>'.$row['team_members'].'</p>';
                echo '<p><b>Projekti tüüp: </b>'.$row['m_type'].'</p>';
                if ($row['m_type']=="M1") {
                    echo '<p><b>Juhendaja info: </b></p><table border="1"><tr><th>Juhendaja nimi</th><th>Ametikoht</th><th>Tegevusvaldkond</th></tr><tr><th>'.$row['supervisor_name'].'</th><th>'.$row['supervisor_occupation'].'</th><th>'.$row['field_of_activity'].'</th></tr></table><br>';
                }
                echo '<p><b>Projekti pealkiri: </b>'.$row['project_name'].'</p>';
                echo '<p><b>Taotletav summa: </b>'.$row['requested_amount'].'</p>';
                echo '<p><b>Projekti eeldatav periood: </b>'.$row['initial_date'].' - '.$row['end_date'].'</p>';
                echo '<p><b>Taotleva summa kasutamise eesmärk: </b>'.$row['requested_amount_goal'].'</p>';
                echo '<p><b>Probleemi püstitus ja sihtrühma kirjeldus: </b>'.$row['problem'].'</p>';
                echo '<p><b>Projekti eesmärk: </b>'.$row['project_goal'].'</p>';
                echo '<p><b>Projekti oodatavad tulemused: </b>'.$row['results'].'</p>';
                echo '<p><b>Tegevuste loetelu koos tähtajaga: </b>'.$row['activities'].'</p>';
                switch($row['m_type']){
                  case "M1":
                    echo '<p><b>Uurimismeetodite kirjeldus: </b>'.$row['m'].'</p>';
                    break;
                  case "M2":
                    echo '<p><b>Planeeritava ürituse programmi kirjeldus ning esinejate loetelu; projekti raames avaldatava materjali kirjeldus: </b>'.$row['m'].'</p>';
                    break;
                  case "M3":
                    echo '<p><b>Teadustöö esitlemise vormi, teadustöö sisu ning esitluspaiga või ürituse kirjeldus: </b>'.$row['m'].'</p>';
                    break;
                }
                echo '<p><b>Toetuse taotlemise põhjus: </b>'.$row['reason'].'</p>';

                echo '<p><b>Projekti eelarve ning põhjendus: </b></p><table border="1"><tr><th>Eelarvernamea ehk kuluartikkel</th><th>Ühik</th><th>Ühiku hind</th><th>Ühiku kogus</th><th>Kuluartikli summa</th><th>Rahastaja</th></tr>';

                for ($i = 0; $i < sizeof(json_decode($row['budget_table'])[0]); $i++) {
                  echo '<tr><th>'.json_decode($row['budget_table'])[0][$i].'</th><th>'.json_decode($row['budget_table'])[1][$i].'</th><th>'.json_decode($row['budget_table'])[2][$i].'</th><th>'.json_decode($row['budget_table'])[3][$i].'</th><th>'.json_decode($row['budget_table'])[4][$i].'</th><th>'.json_decode($row['budget_table'])[5][$i].'</th></tr>';
                }
                echo '</table><br>';
                echo '<p><b>Eelarve põhjendus: </b>'.$row['budget_explanation'].'</p>';
                break;
        }
      }
      $stmt->free_result();
      $stmt->close();
      $mysqli->close();
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
