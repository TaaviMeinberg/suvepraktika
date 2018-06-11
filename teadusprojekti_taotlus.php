<?php
require './php/sessionCheck.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>

    <div class="content">
        <div class="chapter-header">
			<p>Teadusprojekti taotlus</p>
            <p>Projekti ning taotleja üldandmed</p>
			<button style="float: right; type="button" class="btn btn-success" onclick="location.href='main.php';">Tagasi avalehele</button>
			<button style="float: left; type="button" class="btn btn-success" onclick="location.href='uusTaotlus.php';">Tagasi uue taotluse lehele</button>
			<br>
			<br>
        </div>
        <div class="chapter">

            <div class="form-group">
                <label>Ees- ja perekonnanimi / taotleva organisatsiooni nimi ja vastutava (allkirjaõigusliku) isiku nimi:</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>Organisatsiooni seos tudengi ja ülikooliga:</label>
                <input type="text" class="form-control" name="connection">
            </div>
            <div class="form-group">
                <label>Taotleja isikukood / organisatsiooni registrikood:</label>
                <input type="text" class="form-control" name="code">
            </div>

            <div class="form-group">
                <label>Taotleja kontaktandmed:</label>
                <input type="number" class="form-control" placeholder="telefoninumber" name="phone">
                <br>
                <input type="email" class="form-control" placeholder="e-posti aadress" name="email">
                <br>
                <input type="text" class="form-control" placeholder="elukoha aadress" name="address">

            </div>
            <div class="form-group">
                <label>Õppeinfo:</label>
                <input type="text" class="form-control" placeholder="eriala" name="speciality">
                <br>
                <input type="text" class="form-control" placeholder="õppetase" name="degree">
                <br>
                <input type="number" class="form-control" placeholder="õppeaasta" name="year">
            </div>
            <div class="form-group">
                <label>Projekti juht:</label>
                <input type="text" class="form-control" name="project_manager">
                <small name="project_manager" class="form-text text-muted">M1 ja M3 projektide puhul saab juhiks olla toetuse taotleja.</small>
            </div>
            <div class="form-group">
                <label>Teised projektimeeskonna liikmed</label>
                <input type="text" class="form-control" name="team_members">
            </div>
            <div class="form-group">
                <label>Juhendaja info (ainult M1 projekt):</label>
                <input type="text" class="form-control" placeholder="juhendaja nimi" name="supervisor_name">
                <br>
                <input type="text" class="form-control" placeholder="ametikoht/harnameus" name="supervisor_occupation">
                <br>
                <input type="text" class="form-control" placeholder="tegevusvaldkond" name="supervisor_field">
            </div>
            <div class="form-group">
                <label>Projekti pealkiri</label>
                <input type="text" class="form-control" name="project_name">
            </div>
            <div class="form-group">
                <label>Taotletav summa</label>
                <input type="number" class="form-control" min="0" name="requested_amount">
            </div>
            <div class="form-group">
                <label>Projekti eeldatav periood:</label>
                <input type="date" class="form-control" placeholder="alguskuupäev" name="initial_date">
                <br>
                <input type="date" class="form-control" placeholder="lõpukuupäev" name="end_date">
            </div>
            <div class="form-group">
                <label>Taotletava summa kasutamise eesmärk (ühe lausega)</label>
                <input type="text" class="form-control" name="requested_amount_goal">
            </div>


        </div>
        <hr>
        <div class="chapter-header">
            <p>Projekti meede</p>
        </div>
        <div class="chapter">
            <div class="form-group">
                <label>Vali projekti meede:</label>
                <select class="form-control" name="project_option">
                    <option>(M1) teadustöö läbiviimine (kuni 400 eurot)</option>
                    <option>(M2) teaduse populariseerimine (kuni 800 eurot)</option>
                    <option>(M3) teadustöö esitlemine (kuni 300 eurot)</option>
                </select>
                <small name="project_option" class="form-text text-muted">
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
        </div>
        <hr>
        <div class="chapter-header">
            <p>Projekti kirjeldus</p>
        </div>
        <div class="chapter">
            <div class="form-group">
                <label>Probleemi püstitus ja sihtrühma kirjeldus (kirjelda sihtgruppi ja selle probleeme või vajadusi; põhjenda
                    projekti olulisust):</label>
                <input type="text" class="form-control" name="problem">
            </div>
            <div class="form-group">
                <label>Projekti eesmärk (ühe lausega; eesmärk ei saa olla tegevus):</label>
                <input type="text" class="form-control" name="project_goal">
            </div>
            <div class="form-group">
                <label>Projekti oodatavad tulemused
                    <br>(mõju sihtgrupile, valdkonnale ja ühiskonnale laiemalt; oodatav tulemus peab
                    olema konkreetne, objektiivselt mõõdetav ja kaasa aitama eesmärgi saavutamisele):</label>
                 <textarea class="form-control" name="results" placeholder="1. ..."> </textarea>
            </div>
            <div class="form-group">
                <label>Tegevuste loetelu koos tähtajaga (vajadusel kirjelda, kuidas tegevused aitavad oodatavaid tulemusi saavutada):</label>
                <textarea class="form-control" name="activities" placeholder="1. ..."> </textarea>
            </div>
            <div class="form-group">
                <label>(ainult M1 taotleja) Kasutatavate uurimismeetodite kirjeldus:</label>
                <input type="text" class="form-control" name="m1">
            </div>
            <div class="form-group">
                <label>(ainult M2 taotleja) Planeeritava ürituse programmi kirjeldus ning esinejate loetelu; projekti raames avaldatava
                    materjali kirjeldus (Vajadusel lisada taotlusele lisafailina.):</label>
                <input type="text" class="form-control" name="m2">
            </div>
            <div class="form-group">
                <label>(ainult M3 taotleja) Teadustöö esitlemise vormi, teadustöö sisu ning esitluspaiga või ürituse kirjeldus:</label>
                <input type="text" class="form-control" name="m3">
            </div>
            <div class="form-group">
                <label>Toetuse taotlemise põhjus (kunameas aitab taotletav toetus kaasa projekti kvaliteedi olulisele paranemisele
                    ehk mida saab rahastuse abil paremini teha):</label>
                <input type="text" class="form-control" name="reason">
				<hr>
        <div class="chapter-header">
            <p>Projekti eelarve ning põhjendus</p>
        </div>
        <div class="chapter">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Eelarvernamea ehk kuluartikkel</th>
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
                <th class="tableExplanation">(märknamea, kas kulu on planeeritud TLÜ toetusest, omafinantseeringust või kaasfinantseeringust*)</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="text" class="form-control" placeholder="1."></td>
                <td><input type="number" class="form-control" placeholder=""></td>
                <td><input type="number" class="form-control" placeholder=""></td>
                <td><input type="number" class="form-control" placeholder=""></td>
                <td><input type="number" class="form-control" placeholder=""></td>
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
                <td>TLÜst taotletav summa:<input type="number" class="form-control" placeholder=""></td>

              </tr>
            </tbody>
          </table>
        </div>
        <hr>
       
          <div class="form-group">
              <label>17. Eelarve põhjendus (selgitus erinevustele planeeritust; seos projekti elluviimisega):</label>
              <input type="text" class="form-control" placeholder="eelarve põhjendus" name="reason">
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
                  <li>olen teadlik, et aruandename menetleval komisjonil on õigus nõuda lisadokumente ja kutsuda aruande esitaja vestlusele, mille käigus peab aruande esitaja andma lisainformatsiooni projekti, selle osade ja/või rahaliste vahendite kasutamise kohta.</li>
                </ul>
            </div>
            <div class="form-group">
                <label>Kinnitan:</label>
                <input type="checkbox" class="form-control" placeholder="">
            </div>
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

