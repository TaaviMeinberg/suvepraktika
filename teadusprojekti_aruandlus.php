<?php
require './php/sessionCheck.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
	<meta http-equiv="content-type" content="application/vnd.ms-excel" charset="UTF-8">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	 <script type="text/javascript">
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
        cell1.innerHTML = '<input type="text" class="form-control" placeholder="">';
        cell2.innerHTML = '<input type="number" class="form-control" placeholder="" min="0">';
        cell3.innerHTML = '<input type="number" class="form-control" placeholder="" min="0">';
        cell4.innerHTML = '<input type="number" class="form-control" placeholder="" min="0">';
        cell5.innerHTML = '<input type="number" class="form-control" placeholder="" min="0">';
        cell6.innerHTML = '<input type="text" class="form-control" placeholder="">';
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
    </script>
</head>

<body>
    <div class="content">
        <div class="chapter-header">
            <p>Projekti ning taotleja üldandmed</p>
        </div>
        <div class="chapter">

            <div class="form-group">
                <label>1. Taotleja ees- ja perekonnanimi / taotleva organisatsiooni nimi ja vastutava (allkirjaõigusliku) isiku nimi </br>( * toetuse taotleja on projekti lõppedes toetuse saaja)</br></label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>2. Taotleja isikukood / organisatsiooni registrikood </label>
                <input type="number" class="form-control" name="code">
            </div>

            <div class="form-group">
                <label>3.Taotleja kontaktandmed:</label>
                <input type="number" class="form-control" placeholder="telefoninumber" name="phone">
                <br>
                <input type="email" class="form-control" placeholder="e-posti aadress" name="email">
                <br>
                <input type="text" class="form-control" placeholder="elukoha aadress" name="address">

            </div>
            <div class="form-group">
                <label>4. Taotleja arveldusarve number </label>
                <input type="number" class="form-control" placeholder="number" name="bank_account">
            </div>
            <div class="form-group">
                <label>5. Aruandluse koostaja (juhul, kui erineb taotlejast)</label>
                <input type="text" class="form-control" name="report_compiler">
            </div>
            <div class="form-group">
                <label>6. Projekti juht (M1 ja M3 projektide puhul saab juhiks olla toetuse taotleja)</label>
                <input type="text" class="form-control" name="project_manager">
            </div>
            <div class="form-group">
                <label>7. Teised projektimeeskonna liikmed:</label>
                <input type="text" class="form-control" name="team_members">
            </div>
			<div class="form-group">
                <label>8. Juhendaja nimi, ametikoht/haridus, tegevusvaldkond (ainult M1 projekt) :</label>
                <input type="text" class="form-control" placeholder="juhendaja nimi" name="supervisor_name">
                <br>
                <input type="text" class="form-control" placeholder="ametikoht/haridus" name="supervisor_occupation">
                <br>
                <input type="text" class="form-control" placeholder="tegevusvaldkond" name="field_of_activity">
            </div>
			<div class="form-group">
                <label>9. Projekti pealkiri :</label>
                <input type="text" class="form-control" name="project_name">
            </div>

            <div class="form-group">
                <label>10. Projekti tegelik elluviimise periood (algus- ning lõpukuupäev) :</label>
                <input type="date" class="form-control" placeholder="alguskuupäev" name="initial_date">
                <br>
                <input type="date" class="form-control" placeholder="lõpukuupäev" name="end_date">
            </div>
			<div class="form-group">
                <label>11. Määratav toetus :</label>
                <input type="number" class="form-control" name="grant_awarded">
			</div>
			<div class="form-group">
                <label>12. Tegelik kulu (teadusprojektide vahenditest planeeritud kulu) :</label>
                <input type="number" class="form-control" name="actual_cost">
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
                <input type="text" class="form-control" name="problem">
				</div>

            <div class="form-group">
                <label>14. Projekti eesmärk :</label>
                <input type="text" class="form-control" name="project_goal">
            </div>
            <div class="form-group">
                <label>15. Projekti tulemused
                    <br>(eesmärk on võrrelda, mis sai esitatud projekti taotluses ning kuidas see tegelikult täitus. “Planeeritud” lahtrisse kopeerida taotluses esitatu ning “tegelik” lahtris kirjeldada tegelikku teostamist) :</br></label>
            </div>
            <div class="form-group">
                <label>15.1 Oodatud tulemused <br>(mida projektiga taheti saavutada) :</br></label>
                <textarea rows="" cols="" placeholder="1." class="form-control" name="expected_results"></textarea>

				<tr>

              </tr>
            </div>
			<div class="form-group">
                <label>15.2 Tegelikud tulemused : <br>(kui tegelik erineb oodatust, siis selgita ja põhjenda) :</br></label>
                <textarea rows="" cols="" placeholder="1." class="form-control" name="actual_results"></textarea>

				<tr>

              </tr>
            </div>
			<div class="form-group">
                <label>16. Tegevuste loetelu koos tähtajaga :</label>
            </div>
			<div class="form-group">
                <label>16.1 Planeeritud tegevused ja tähtaeg <br>(mida projektiga taheti saavutada) :</label>
                <textarea rows="" cols="" placeholder="1." class="form-control" name="planned_activities"></textarea>

				<tr>

              </tr>
            </div>
			<div class="form-group">
                <label>16.2 Tegelikud tegevused ja tähtaeg <br>(kui tegelik erineb oodatust, siis selgita ja põhjenda):</br></label>
                <textarea rows="" cols="" placeholder="1." class="form-control" name="actual_activities"></textarea>

				<tr>

              </tr>
            </div>
            <div class="form-group">
                <label>17.(ainult M1 taotleja) Uurimismeetodite kirjeldus :</label>
            </div>
			<div class="form-group">
                <label>17.1. Planeeritud :</label>
                <textarea rows="" cols="" placeholder="1." class="form-control" name="planned_m1"></textarea>
				<tr>

              </tr>
            </div>
			<div class="form-group">
                <label>17.2. Tegelik :</label>
                <textarea rows="" cols="" placeholder="1." class="form-control" name="actual_m1"></textarea>
				<tr>

              </tr>
            </div>
            <div class="form-group">
                <label>18. (ainult M2 taotleja) Planeeritava ürituse programmi kirjeldus ning esinejate loetelu; projekti raames avaldatava
                    materjali kirjeldus (Vajadusel lisada taotlusele lisafailina.):</label>

            </div>
			<div class="form-group">
                <label>18.1. Planeeritud :</label>
                <textarea rows="" cols="" placeholder="1." class="form-control" name="planned_m2"></textarea>
				<tr>

              </tr>
            </div>
			<div class="form-group">
                <label>18.2 Tegelik :</label>
                <textarea rows="" cols="" placeholder="1." class="form-control" name="actual_m2"></textarea>
				<tr>

              </tr>
            </div>
            <div class="form-group">
                <label>(ainult M3 taotleja) Teadustöö esitlemise vormi, teadustöö sisu ning esitluspaiga või ürituse kirjeldus:</label>
            </div>
			<div class="form-group">
                <label>19.1. Planeeritud :</label>
                <textarea rows="" cols="" placeholder="1." class="form-control" name="planned_m3"></textarea>
				<tr>

              </tr>
            </div>
			<div class="form-group">
                <label>19.2 Tegelik :</label>
                <textarea rows="" cols="" placeholder="1." class="form-control" name="actual_m3"></textarea>
				<tr>

              </tr>
            </div>
            <div class="form-group">
                <label>20. Täiendav informatsioon projekti kohta (meediakajastus, koostööpartnerid jm oluline):</label>
                <textarea rows="" cols="" placeholder="1." class="form-control" name="additional_info"></textarea>
            </div>

			 <hr>
        <div class="chapter-header">
            <p>Projekti eelarve ning põhjendus</p>
        </div>
        <div class="chapter">
          <table class="table table-bordered">
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
                <td><input type="text" class="form-control" placeholder="1."></td>
                <td><input type="number" class="form-control" placeholder="" min="0"></td>
                <td><input type="number" class="form-control" placeholder="" min="0"></td>
                <td><input type="number" class="form-control" placeholder="" min="0"></td>
                <td><input type="number" class="form-control" placeholder="" min="0"></td>
                <td><input type="text" class="form-control" placeholder=""></td>
              </tr>
              <tr>
                <td><button type="button" name="addToTable">+</button></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Projekti summa kokku:<input type="number" class="form-control" placeholder=""></td>
                <td>TLÜst toatletav summa:<input type="number" class="form-control" placeholder=""></td>

              </tr>
            </tbody>
          </table>
        </div>
        <hr>

          <div class="form-group">
              <label>17. Eelarve põhjendus (selgitus erinevustele planeeritust; seos projekti elluviimisega):</label>
              <input type="text" class="form-control" placeholder="eelarve põhjendus">
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
                <label>Kinnitan:</label>
                <input type="checkbox" class="form-control" placeholder="">
            </div>
        </div>
        </div>

        <hr>
		</div>
        </div>
		</div>
	</div>
<!--

Projekti eelarve ning põhjendus vaja teha, tuleb keerulisem

-->
    </div>

</body>

</html>

