<?php
require './php/sessionCheck.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Teadusprojekti taotlus</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<meta http-equiv="content-type" content="application/vnd.ms-excel;" charset="UTF-8">
	<meta charset="UTF-8">
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
        cell2.innerHTML = '<input name="unit" type="text" class="form-control" placeholder="">';
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
				let connection = document.getElementById("connection").value;
			let id = document.getElementById("code").value;
			let phone = document.getElementById("phone").value;
			let email = document.getElementById("email").value;
			let address = document.getElementById("address").value;
			let speciality = document.getElementById("speciality").value;
			let degree = document.getElementById("degree").value;
				let year = document.getElementById("year").value;
			let project_manager = document.getElementById("project_manager").value;
			let team_members = document.getElementById("team_members").value;
			let supervisor_name = document.getElementById("supervisor_name").value;
			let supervisor_occupation = document.getElementById("supervisor_occupation").value;
			let field_of_activity = document.getElementById("field_of_activity").value;
			let project_name = document.getElementById("project_name").value;
				let requested_amount = document.getElementById("requested_amount").value;
			let initial_date = document.getElementById("initial_date").value;
			let end_date = document.getElementById("end_date").value;
			let requested_amount_goal = document.getElementById("requested_amount_goal").value;
			let problem = document.getElementById("problem").value;
			let project_goal = document.getElementById("project_goal").value;
			let results = document.getElementById("results").value;
			let activities = document.getElementById("activities").value;
			let m = document.getElementById("m").value;
			let m_type = document.getElementById("project_type").value;
			let reason = document.getElementById("reason").value;
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
			$.post("./php/form_submit/teadusprojekti_taotlus_submit.php", {name:name, organisation:organisation, connection:connection, id:id, phone:phone, email:email, address:address, speciality:speciality, degree:degree, year:year, project_manager:project_manager, team_members:team_members, supervisor_name:supervisor_name, supervisor_occupation:supervisor_occupation, field_of_activity:field_of_activity, project_name:project_name, requested_amount:requested_amount, initial_date:initial_date, end_date:end_date, requested_amount_goal:requested_amount_goal, problem:problem, project_goal:project_goal, results:results, activities:activities, m_type:m_type, m:m, reason:reason, jsonTable:jsonTable, project_budget_total:project_budget_total, requested_budget:requested_budget, budget_explanation:budget_explanation}).done(function( data ) {
			  alert( "Andmed: " + data );
			});
		}
      }
    </script>
</head>

<body>

    <div class="content">
        <div class="chapter-header">
			<p>Teadusprojekti taotlus</p>
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
                <label>Organisatsiooni seos tudengi ja ülikooliga:</label>
                <input type="text" class="form-control" id="connection" maxlength="500">
            </div>
            <div class="form-group">
                <label>Taotleja isikukood / organisatsiooni registrikood:</label>
                <input type="text" class="form-control required" class="required" id="code" maxlength="11">
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
                <label>Õppeinfo:</label>
                <input type="text" class="form-control required" placeholder="eriala" id="speciality" maxlength="60">
                <br>
                <input type="text" class="form-control required" placeholder="õppetase" id="degree" maxlength="60">
                <br>
                <input type="number" class="form-control required" placeholder="õppeaasta" id="year">
            </div>
            <div class="form-group">
                <label>Projekti juht:</label>
                <input type="text" class="form-control required" id="project_manager" maxlength="60">
                <small id="project_manager" class="form-text text-muted">M1 ja M3 projektide puhul saab juhiks olla toetuse taotleja.</small>
            </div>
            <div class="form-group">
                <label>Teised projektimeeskonna liikmed</label>
                <input type="text" class="form-control" id="team_members" maxlength="1000">
            </div>
            <div class="form-group">
                <label>Juhendaja info (ainult M1 projekt):</label>
                <input type="text" class="form-control" placeholder="juhendaja nimi" id="supervisor_name" maxlength="60">
                <br>
                <input type="text" class="form-control" placeholder="ametikoht/haridus" id="supervisor_occupation" maxlength="60">
                <br>
                <input type="text" class="form-control" placeholder="tegevusvaldkond" id="field_of_activity" maxlength="60">
            </div>
            <div class="form-group">
                <label>Projekti pealkiri</label>
                <input type="text" class="form-control required" id="project_name" maxlength="100">
            </div>
            <div class="form-group">
                <label>Taotletav summa</label>
                <input type="number" class="form-control required" min="0" id="requested_amount">
            </div>
            <div class="form-group">
                <label>Projekti eeldatav periood:</label>
                <input type="date" class="form-control required" placeholder="alguskuupäev" id="initial_date">
                <br>
                <input type="date" class="form-control required" placeholder="lõpukuupäev" id="end_date">
            </div>
            <div class="form-group">
                <label>Taotletava summa kasutamise eesmärk (ühe lausega)</label>
                <input type="text" class="form-control required" id="requested_amount_goal" maxlength="500">
            </div>


        </div>
        <hr>
        <div class="chapter-header">
            <p>Projekti meede</p>
        </div>
        <div class="chapter">
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
                <label id="tyyp">Vali ülevalt projekti M-tüüp.</label>
                <input type="text" class="form-control required" id="m" maxlength="500">
            </div>
            <div class="form-group">
                <label>Toetuse taotlemise põhjus (kuidas aitab taotletav toetus kaasa projekti kvaliteedi olulisele paranemisele
                    ehk mida saab rahastuse abil paremini teha):</label>
                <input type="text" class="form-control required" id="reason" maxlength="400">
				<hr>
            </div>
        </div>
        <hr>
        <div class="chapter-header">
            <p>Projekti kirjeldus</p>
        </div>
        <div class="chapter">
            <div class="form-group">
                <label>Probleemi püstitus ja sihtrühma kirjeldus (kirjelda sihtgruppi ja selle probleeme või vajadusi; põhjenda
                    projekti olulisust):</label>
                <input type="text" class="form-control required" id="problem" maxlength="500">
            </div>
            <div class="form-group">
                <label>Projekti eesmärk (ühe lausega; eesmärk ei saa olla tegevus):</label>
                <input type="text" class="form-control required" id="project_goal" maxlength="500">
            </div>
            <div class="form-group">
                <label>Projekti oodatavad tulemused
                    <br>(mõju sihtgrupile, valdkonnale ja ühiskonnale laiemalt; oodatav tulemus peab
                    olema konkreetne, objektiivselt mõõdetav ja kaasa aitama eesmärgi saavutamisele):</label>
                 <textarea rows="" cols="" class="form-control required" id="results" placeholder="1. ..." maxlength="500"></textarea>
            </div>
            <div class="form-group">
                <label>Tegevuste loetelu koos tähtajaga (vajadusel kirjelda, kuidas tegevused aitavad oodatavaid tulemusi saavutada):</label>
                <textarea rows="" cols="" class="form-control required" id="activities" placeholder="1. ..."  maxlength="500"></textarea>
            </div>
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

          <div class="form-group">
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
				<button  type="button" class="btn btn-success" onclick="sendForm()">Kinnita ja esita taotlus</button>
				</center>
            </div>
        </div>
        </div>
            </div>
        </div>
    </div>
<script>
			function mChange() {
                switch(document.getElementById("project_type").value){
                    case "M1":
                        document.getElementById("tyyp").innerHTML ="(ainult M1 taotleja) Uurimismeetodite kirjeldus :";
                        break;
                    case "M2":
                        document.getElementById("tyyp").innerHTML ="(ainult M2 taotleja) Planeeritava ürituse programmi kirjeldus ning esinejate loetelu; projekti raames avaldatava materjali kirjeldus (Vajadusel lisada taotlusele lisafailina.):";
                        break;
                    case "M3":
                        document.getElementById("tyyp").innerHTML ="(ainult M3 taotleja) Teadustöö esitlemise vormi, teadustöö sisu ning esitluspaiga või ürituse kirjeldus:";
                        break;
                }
			}


	</script>
</body>

</html>
