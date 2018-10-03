<?php
require './php/sessionCheck.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tudengiprojekti aruandlus</title>
	<meta http-equiv="content-type" content="application/vnd.ms-excel" charset="UTF-8">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
	var required_fields = true;
    let counter=3;
      function addOneToTable() {
        var table = document.getElementById("projectBudgetTable");
        var row = table.insertRow(counter);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        cell1.innerHTML = '<input name="budget" type="text" class="form-control" placeholder="">';
        cell2.innerHTML = '<input name="unit" type="number" class="form-control" placeholder="" min="0">';
        cell3.innerHTML = '<input name="cost_of_unit" type="number" class="form-control" placeholder="" min="0">';
        cell4.innerHTML = '<input name="unit_amount" type="number" class="form-control" placeholder="" min="0">';
        cell5.innerHTML = '<input name="cost_of_item" type="number" class="form-control" placeholder="" min="0">';
        cell6.innerHTML = '<input name="funder" type="text" class="form-control" placeholder="">';
        counter++;
      }
      function removeOneFromTable() {
        if (counter>3) {
          document.getElementById("projectBudgetTable").deleteRow(counter-1);
          counter--;
        } else {
          alert("Rohkem ei saa eemaldada!");
        }
      }
      function sendForm() {
        //event.preventDefault();
		required_fields = true;
		$('.required').each(function(event){
			if (this.value == "") {
				this.style.borderColor = "red";
				required_fields = false;
			}
		});
		if (required_fields == false) {
			alert("Täida koik nõutud väljad!");
		} else {

			let name = document.getElementById("name").value;
			let organisation = 0;
			if (document.getElementById("organisation").checked==true) {
			  organisation=1;
			}
			let id = document.getElementById("code").value;
			let phone = document.getElementById("phone").value;
			let email = document.getElementById("email").value;
			let address = document.getElementById("address").value;
			let bank_acc = document.getElementById("bank_account").value;
			let report_compiler = document.getElementById("report_compiler").value;
			let project_manager = document.getElementById("project_manager").value;
			let team_members = document.getElementById("team_members").value;
			let project_name = document.getElementById("project_name").value;
			let initial_date = document.getElementById("initial_date").value;
			let end_date = document.getElementById("end_date").value;
			let grant_awarded = document.getElementById("grant_awarded").value;
			let used_grant_awarded = document.getElementById("used_grant_awarded").value;
			let actual_cost = document.getElementById("actual_cost").value;
			let problem = document.getElementById("problem").value;
			let project_goal = document.getElementById("project_goal").value;
			let planned_results = document.getElementById("planned_results").value;
			let actual_results = document.getElementById("actual_results").value;
      let activity_list = document.getElementById("activity_list").value;
			let planned_activities = document.getElementById("planned_activities").value;
			let actual_activities = document.getElementById("actual_activities").value;
			let additional_info = document.getElementById("additional_info").value;
			let tableArray = [[],[],[],[],[],[]];
			for (i = 0; i < document.getElementsByName("budget").length; i++) {
			  tableArray[0].push(document.getElementsByName("budget")[i].value);
			  tableArray[1].push(document.getElementsByName("unit")[i].value);
			  tableArray[2].push(document.getElementsByName("cost_of_unit")[i].value);
			  tableArray[3].push(document.getElementsByName("unit_amount")[i].value);
			  tableArray[4].push(document.getElementsByName("cost_of_item")[i].value);
			  tableArray[5].push(document.getElementsByName("funder")[i].value);
			}
			let jsonTable = JSON.stringify(tableArray);

			let project_budget_total = document.getElementById("project_budget_total").value;
			let requested_budget = document.getElementById("requested_budget").value;
			let budget_explanation = document.getElementById("budget_explanation").value;
			$.post("./php/form_submit/tudengiprojekti_aruandlus_submit.php", {name:name, organisation:organisation, id:id, phone:phone, email:email, address:address, bank_acc:bank_acc, report_compiler:report_compiler, project_manager:project_manager, team_members:team_members, project_name:project_name, initial_date:initial_date, end_date:end_date, grant_awarded:grant_awarded, used_grant_awarded:used_grant_awarded, actual_cost:actual_cost, problem:problem, project_goal:project_goal, planned_results:planned_results, actual_results:actual_results, activity_list:activity_list, planned_activities:planned_activities, actual_activities:actual_activities, additional_info:additional_info, jsonTable:jsonTable, project_budget_total:project_budget_total, requested_budget:requested_budget, budget_explanation:budget_explanation}).done(function( data ) {
			  alert( "Andmed: " + data );
			});
		}
      }
    </script>
</head>

<body>
    <div class="content">
        <div class="chapter-header">
			<p>Tudengiprojekti aruandlus</p>
            <p>Projekti ning taotleja üldandmed</p>
			<button style="float: right;" type="button" class="btn btn-success" onclick="location.href='main.php';">Tagasi avalehele</button>
			<button style="float: left;" type="button" class="btn btn-success" onclick="location.href='uusTaotlus.php';">Tagasi uue taotluse lehele</button>
			<br>
			<br>
        </div>
        <div class="chapter">

            <div class="form-group">
                <label>Ees- ja perekonnanimi / taotleva organisatsiooni nimi ja vastutava (allkirjaõigusliku) isiku nimi:</label>
                <input type="text" class="form-control required" id="name" maxlength="60">
		<label>Organisatsioon:</label>
                <input id="organisation" type="checkbox">
            </div>

            <div class="form-group">
                <label>Taotleja isikukood / organisatsiooni registrikood:</label>
                <input type="text" class="form-control required" id="code" maxlength="11">
            </div>

            <div class="form-group">
                <label>Taotleja kontaktandmed:</label>
                <input type="text" class="form-control required" placeholder="telefoninumber" id="phone" maxlength="8">
                <br>
                <input type="email" class="form-control required" placeholder="e-posti aadress" id="email" maxlength="60">
                <br>
                <input type="text" class="form-control required" placeholder="elukoha aadress" id="address" maxlength="60">

            </div>
            <div class="form-group">
                <label>Taotleja arveldusarve number:</label>
                <input type="text" class="form-control required" placeholder="arveldusarve number" id="bank_account" maxlength="22">
            </div>
            <div class="form-group">
                <label>Aruandluse koostaja (juhul, kui erineb taotlejast):</label>
                <input type="text" class="form-control" placeholder="aruandluse koostaja" id="report_compiler" maxlength="60">
            </div>
            <div class="form-group">
                <label>Projekti juht:</label>
                <input type="text" class="form-control required" id="project_manager" maxlength="60">
            </div>
            <div class="form-group">
                <label>Teised projektimeeskonna liikmed:</label>
                <input type="text" class="form-control" id="team_members" maxlength="240">
            </div>
            <div class="form-group">
                <label>Projekti pealkiri:</label>
                <input type="text" class="form-control required" id="project_name" maxlength="500">
            </div>
            <div class="form-group">
                <label>Projekti tegelik elluviimise periood (algus- ning lõpukuupäev):</label>
                <input type="date" class="form-control required" id="initial_date">
                <br>
                <input type="date" class="form-control required" id="end_date">
            </div>
            <div class="form-group">
                <label>Määratud toetuse summa (kui suur toetus tegelikult määrati komisjoni poolt):</label>
                <input type="number" class="form-control required" min="0" id="grant_awarded">
            </div>
            <div class="form-group">
                <label>Kasutatud toetuse summa (kui palju määratud toetusest ära kasutati):</label>
                <input type="number" class="form-control required" min="0" id="used_grant_awarded">
            </div>
            <div class="form-group">
                <label>Projekti tegelik kogukulu (kasutatud toetus + kaasfinantseering + omaosalus):</label>
                <input type="number" class="form-control required" min="0" id="actual_cost">
            </div>


        </div>
        <hr>
        <div class="chapter-header">
            <p>Projekti kirjeldus</p>
        </div>
        <div class="chapter">
            <div class="form-group">
                <label>Probleemi püstitus ja sihtrühma kirjeldus (vt taotlusest):</label>
                <input type="text" class="form-control required" id="problem" maxlength="3000">
            </div>
            <div class="form-group">
                <label>Projekti eesmärk (vt taotlusest):</label>
                <input type="text" class="form-control required" id="project_goal" maxlength="3000">
            </div>
            <div class="form-group">
                <label>Projekti tulemused
                    <br>(Võrrelda projekti taotluses planeeritut tegelike tulemustega.):</label>
			</div>
			<div class="form-group">
				<label>Oodatud tulemused (mida projektiga taheti saavutada, vt taotlusest):
				 <textarea class="form-control required" id="planned_results" placeholder="1. ..." maxlength="3000"></textarea>
            </div>
            <div class="form-group">
                <label>Tegelikud tulemused (mida projektiga tegelikult saavutati):</label>
                 <textarea class="form-control required" id="actual_results" placeholder="1. ..." maxlength="3000"></textarea>
            </div>
            <div class="form-group">
                <label>Tegevuste loetelu koos tähtajaga:</label>
                <textarea class="form-control required" id="activity_list" placeholder="1. ..." maxlength="3000"></textarea>
            </div>
            <div class="form-group">
                <label>Planeeritud tegevused ja tähtaeg (vt taotlusest):</label>
                 <textarea class="form-control required" id="planned_activities" placeholder="1. ..." maxlength="3000"></textarea>
            </div>
            <div class="form-group">
                <label>Tegelikud tegevused ja tähtaeg (kui tegelik erineb planeeritust, siis põhjenda):</label>
				 <textarea class="form-control required" id="actual_activities" placeholder="1. ..." maxlength="3000"></textarea>
            </div>
            <div class="form-group">
                <label>Täiendav informatsioon projekti kohta (meediakajastus, koostööpartnerid jm oluline, mida ei saanud eelnevates punktides kirjutada või selgitada):</label>
                <input type="text" class="form-control" id="additional_info" maxlength="3000">
            </div>
        </div>
        <hr>
        <div class="chapter-header">
            <p>Projekti eelarve ning põhjendus</p>
        </div>
        <div class="chapter">
          <table class="table table-bordered" id="projectBudgetTable">
            <thead>
              <tr>
                <th>Kuluartikkel</th>
                <th>Ühik</th>
                <th>Ühiku hind</th>
                <th>Ühiku kogus</th>
                <th>Kuluartikli summa</th>
                <th>Rahastaja</th>
              </tr>
              <tr>
                <th class="tableExplanation">(nt. trükkimine, transport)</th>
                <th class="tableExplanation">(nt. plakat, bussi pilet)</th>
                <th class="tableExplanation">(nt. ühe plakati hind, ühe bussi pileti hind)</th>
                <th class="tableExplanation">(nt. 45 plakatit, 10 bussipiletit)</th>
                <th class="tableExplanation">(ühiku hind x ühiku kogus)</th>
                <th class="tableExplanation">(märkida, kas kulu on planeeritud TLÜ toetusest, omafinantseeringust või kaasfinantseeringust*)</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input name="budget" type="text" class="form-control" placeholder="1."></td>
                <td><input name="unit" type="text" class="form-control" placeholder=""></td>
                <td><input name="cost_of_unit" type="number" class="form-control" placeholder="" min="0"></td>
                <td><input name="unit_amount" type="number" class="form-control" placeholder="" min="0"></td>
                <td><input name="cost_of_item" type="number" class="form-control" placeholder="" min="0"></td>
                <td><input name="funder" type="text" class="form-control" placeholder=""></td>
              </tr>
              <tr>
                <td><button type="button" name="addToTable" onclick="addOneToTable()">+</button> <button type="button" name="removeFromTable" onclick="removeOneFromTable()">-</button></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Projekti summa kokku:<input type="number" id="project_budget_total" class="form-control required" placeholder=""></td>
                <td>TLÜst toatletav summa:<input type="number" id="requested_budget" class="form-control required" placeholder=""></td>

              </tr>
            </tbody>
          </table>
        </div>
        <hr>
        <div class="chapter">
          <div class="form-group">
              <br>
              <label>Eelarve põhjendus (selgitus erinevustele planeeritust; seos projekti elluviimisega):</label>
              <input type="text" id="budget_explanation" class="form-control required" placeholder="eelarve põhjendus" maxlength="400">
          </div>
        </div>

        <hr>
        <div class="chapter-header">
            <p>Kinnitusleht</p>
        </div>
        <div class="chapter">
            <div class="form-group">
                <label>Käesoleva aruande allkirjastamisega kinnitan, et:</label>
                <ul>
                  <li>aruandes esitatud andmed on õiged ning tõesed;</li>
                  <li>olen teadlik, et aruandeid menetleval komisjonil on õigus nõuda lisadokumente ja kutsuda aruande esitaja vestlusele, mille käigus peab aruande esitaja andma lisainformatsiooni projekti, selle osade ja/või rahaliste vahendite kasutamise kohta.</li>
                </ul>
            </div>
            <div class="form-group">
                <center>
				<button  type="button" class="btn btn-success" onclick="sendForm()">Kinnita ja esita aruandlus</button>
				</center>
            </div>
			
        </div>
    </div>

</body>

</html>
