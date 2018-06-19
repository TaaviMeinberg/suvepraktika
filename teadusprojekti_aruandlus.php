<?php
require './php/sessionCheck.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Teadusprojekti aruandlus</title>
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
			let supervisor_name = document.getElementById("supervisor_name").value;
			let supervisor_occupation = document.getElementById("supervisor_occupation").value;
			let field_of_activity = document.getElementById("field_of_activity").value;
			let project_name = document.getElementById("project_name").value;
			let initial_date = document.getElementById("initial_date").value;
			let end_date = document.getElementById("end_date").value;
			let grant_awarded = document.getElementById("grant_awarded").value;
			let actual_cost = document.getElementById("actual_cost").value;
			let problem = document.getElementById("problem").value;
			let project_goal = document.getElementById("project_goal").value;
			let expected_results = document.getElementById("expected_results").value;
			let actual_results = document.getElementById("actual_results").value;
			let planned_activities = document.getElementById("planned_activities").value;
			let actual_activities = document.getElementById("actual_activities").value;
			let m_type = document.getElementById("project_type").value;
			let planned_m = document.getElementById("planned_m").value;
			let actual_m = document.getElementById("actual_m").value;
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
			$.post("./php/form_submit/teadusprojekti_aruandlus_submit.php", {name:name, organisation:organisation, id:id, phone:phone, email:email, address:address, bank_acc:bank_acc, report_compiler:report_compiler, project_manager:project_manager, team_members:team_members, supervisor_name:supervisor_name, supervisor_occupation:supervisor_occupation, field_of_activity:field_of_activity, project_name:project_name, initial_date:initial_date, end_date:end_date, grant_awarded:grant_awarded, actual_cost:actual_cost, problem:problem, project_goal:project_goal, expected_results:expected_results, actual_results:actual_results, planned_activities:planned_activities, actual_activities:actual_activities, m_type:m_type, planned_m:planned_m, actual_m:actual_m, additional_info:additional_info, jsonTable:jsonTable, project_budget_total:project_budget_total, requested_budget:requested_budget, budget_explanation:budget_explanation}).done(function( data ) {
			  alert( "Andmed: " + data );
			});
		}
      }

    </script>
</head>

<body>

    <div class="content">
        <div class="chapter-header">
            <p>Teadusprojekti aruandlus</p>
			<p>Projekti ning taotleja üldandmed</p>
			<button style="float: right;" type="button" class="btn btn-success" onclick="location.href='main.php';">Tagasi avalehele</button>
			<button style="float: left;" type="button" class="btn btn-success" onclick="location.href='uusTaotlus.php';">Tagasi uue taotluse lehele</button>
			<br>
			<br>
        </div>
        <div class="chapter">

            <div class="form-group">
                <label>1. Taotleja ees- ja perekonnanimi / taotleva organisatsiooni nimi ja vastutava (allkirjaõigusliku) isiku nimi </br>( * toetuse taotleja on projekti lõppedes toetuse saaja)</br></label>
                <input type="text" class="form-control required" id="name" maxlength="60">
	    	<label>Organisatsioon:</label>
                <input id="organisation" type="checkbox">

            </div>
            <div class="form-group">
                <label>2. Taotleja isikukood / organisatsiooni registrikood </label>
                <input type="text" class="form-control required" id="code" maxlength="11">
            </div>

            <div class="form-group">
                <label>3.Taotleja kontaktandmed:</label>
                <input type="text" class="form-control required" placeholder="telefoninumber" id="phone" maxlength="8">
                <br>
                <input type="email" class="form-control required" placeholder="e-posti aadress" id="email" maxlength="60">
                <br>
                <input type="text" class="form-control required" placeholder="elukoha aadress" id="address" maxlength="60">

            </div>
            <div class="form-group">
                <label>4. Taotleja arveldusarve number </label>
                <input type="text" class="form-control required" placeholder="number" id="bank_account" maxlength="22">
            </div>
            <div class="form-group">
                <label>5. Aruandluse koostaja (juhul, kui erineb taotlejast)</label>
                <input type="text" class="form-control" id="report_compiler" maxlength="60">
            </div>
            <div class="form-group">
                <label>6. Projekti juht (M1 ja M3 projektide puhul saab juhiks olla toetuse taotleja)</label>
                <input type="text" class="form-control required" id="project_manager" maxlength="60">
            </div>
            <div class="form-group">
                <label>7. Teised projektimeeskonna liikmed:</label>
                <input type="text" class="form-control" id="team_members" maxlength="1000">
            </div>
			<div class="form-group">
                <label>8. Juhendaja nimi, ametikoht/haridus, tegevusvaldkond (ainult M1 projekt) :</label>
                <input type="text" class="form-control" placeholder="juhendaja nimi" id="supervisor_name" maxlength="60">
                <br>
                <input type="text" class="form-control" placeholder="ametikoht/haridus" id="supervisor_occupation" maxlength="60">
                <br>
                <input type="text" class="form-control" placeholder="tegevusvaldkond" id="field_of_activity" maxlength="60">
            </div>
			<div class="form-group">
                <label>9. Projekti pealkiri :</label>
                <input type="text" class="form-control required" id="project_name" maxlength="500">
            </div>

            <div class="form-group">
                <label>10. Projekti tegelik elluviimise periood (algus- ning lõpukuupäev) :</label>
                <input type="date" class="form-control required" placeholder="alguskuupäev" id="initial_date">
                <br>
                <input type="date" class="form-control required" placeholder="lõpukuupäev" id="end_date">
            </div>
			<div class="form-group">
                <label>11. Määratav toetus :</label>
                <input type="number" class="form-control required" id="grant_awarded">
			</div>
			<div class="form-group">
                <label>12. Tegelik kulu (teadusprojektide vahenditest planeeritud kulu) :</label>
                <input type="number" class="form-control required" id="actual_cost">
            </div>
			</div>


        </div>
		<div class="content">
        <div class="chapter-header">
            <p>Projekti kirjeldus</p>
			</div>

        <div class="chapter">
            <div class="form-group">
                <label>13. Probleemi püstitus ja sihtrühma kirjeldus :</label>
                <input type="text" class="form-control required" id="problem" maxlength="3000">
				</div>

            <div class="form-group">
                <label>14. Projekti eesmärk :</label>
                <input type="text" class="form-control required" id="project_goal" maxlength="3000">
            </div>
            <div class="form-group">
                <label>15. Projekti tulemused
                    <br>(eesmärk on võrrelda, mis sai esitatud projekti taotluses ning kuidas see tegelikult täitus. “Planeeritud” lahtrisse kopeerida taotluses esitatu ning “tegelik” lahtris kirjeldada tegelikku teostamist) :</br></label>
            </div>
            <div class="form-group">
                <label>15.1 Oodatud tulemused <br>(mida projektiga taheti saavutada) :</br></label>
                <textarea rows="" cols="" placeholder="1." class="form-control required" id="expected_results" maxlength="3000"></textarea>

				<tr>

              </tr>
            </div>
			<div class="form-group">
                <label>15.2 Tegelikud tulemused : <br>(kui tegelik erineb oodatust, siis selgita ja põhjenda) :</br></label>
                <textarea rows="" cols="" placeholder="1." class="form-control required" id="actual_results" maxlength="3000"></textarea>

				<tr>

              </tr>
            </div>
			<div class="form-group">
                <label>16. Tegevuste loetelu koos tähtajaga :</label>
            </div>
			<div class="form-group">
                <label>16.1 Planeeritud tegevused ja tähtaeg <br>(mida projektiga taheti saavutada) :</label>
                <textarea rows="" cols="" placeholder="1." class="form-control required" id="planned_activities" maxlength="3000"></textarea>

				<tr>

              </tr>
            </div>
			<div class="form-group">
                <label>16.2 Tegelikud tegevused ja tähtaeg <br>(kui tegelik erineb oodatust, siis selgita ja põhjenda):</br></label>
                <textarea rows="" cols="" placeholder="1." class="form-control required" id="actual_activities" maxlength="3000"></textarea>
            </div>
            <div class="form-group">
                <label>Vali projekti meede:</label>
                <select class="form-control required" id="project_type" onchange="mChange()">
                    <option value="" disabled selected>Vali projekti tüüp</option>
                    <option value="M1">(M1) teadustöö läbiviimine (kuni 400 eurot)</option>
                    <option value="M2">(M2) teaduse populariseerimine (kuni 800 eurot)</option>
                    <option value="M3">(M3) teadustöö esitlemine (kuni 300 eurot)</option>
                </select>
                <small id="project_option" class="form-text text-muted">
                    <b>M1:</b> andmete kogumine, töövahendite või teavikute soetamine, tõlkimine ja keeleline toimetamine;
                    <br>
                    <b>M2:</b> teadust populariseerivate ürituste korraldamine, teadust populariseerivate materjalide koostamine
                    ja väljaandmine, tudengite erialaühenduste tegevust populariseerivate ürituste korraldamine ja materjalide
                    koostamine;
                    <br>
                    <b>M3:</b> teaduslike tööde (sh kursusetööde, lõputööde jms) esitlemine, teadustöö esitlemiseks mõeldud
                    üritustel osalemine ja/või üritusele reisimine;
                </small>
            </div>

            <div class="form-group">
                <label id="test2"></label>
            </div>
			<div class="form-group">
                <label>17.1. Planeeritud :</label>
                <textarea rows="" cols="" placeholder="1." class="form-control required" id="planned_m" maxlength="3000"></textarea>
            </div>
			<div class="form-group">
                <label>17.2. Tegelik :</label>
                <textarea rows="" cols="" placeholder="1." class="form-control required" id="actual_m" maxlength="3000"></textarea>
            </div>
            <div class="form-group">
                <label>18. Täiendav informatsioon projekti kohta (meediakajastus, koostööpartnerid jm oluline):</label>
                <textarea rows="" cols="" placeholder="1." class="form-control" id="additional_info" maxlength="3000"></textarea>
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
                <th>Eelarverida ehk kuluartikkel</th>
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
                <td><input name="unit" type="number" class="form-control" placeholder="" min="0"></td>
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

          <div class="form-group">
              <label>19. Eelarve põhjendus (selgitus erinevustele planeeritust; seos projekti elluviimisega):</label>
              <input type="text" id="budget_explanation" class="form-control required" placeholder="eelarve põhjendus" maxlength="400">
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
				<button  type="button" class="btn btn-success" onclick="sendForm()">Esita taotlus</button>
				</center>

            </div>
			<div style="text-align: center;" class="form-group">
			<small id="confirmation" class="form-text text-muted">
				Kinnitades saadab taotluse ära
			</small>
			</div>
        </div>
        </div>

        <hr>
		</div>
        </div>
		</div>
	</div>
    </div>
	<script>
			function mChange() {
                switch(document.getElementById("project_type").value){
                    case "M1":
                        document.getElementById("test2").innerHTML ="(ainult M1 taotleja) Uurimismeetodite kirjeldus :";
                        break;
                    case "M2":
                        document.getElementById("test2").innerHTML ="(ainult M2 taotleja) Planeeritava ürituse programmi kirjeldus ning esinejate loetelu; projekti raames avaldatava materjali kirjeldus (Vajadusel lisada taotlusele lisafailina.):";
                        break;
                    case "M3":
                        document.getElementById("test2").innerHTML ="(ainult M3 taotleja) Teadustöö esitlemise vormi, teadustöö sisu ning esitluspaiga või ürituse kirjeldus:";
                        break;
                }
			}


	</script>
</body>

</html>
