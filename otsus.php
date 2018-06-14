<?php
require './php/sessionCheck.php';
?>

<!DOCTYPE html>
<html>

<head> 
	<title>Otsus</title>
	<meta http-equiv="content-type" content="application/vnd.ms-excel" charset="UTF-8">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
	
	function sendForm() {
		//event.preventDefault();
		
		let application_id = document.getElementById("application_id").value;
		let table_name = document.getElementById("table_name").value;
        let decision = 0;
		if (document.getElementById('accepted').checked == true) {
          decision = 1;
        }
        if (document.getElementById('not_accepted').checked == true) {
          decision = -1;
        }
        if (document.getElementById('not_decided').checked == true) {
          decision = 0;
        }
        let summa = document.getElementById("summa").value;
        let comment = document.getElementById("comment").value;
        $.post(
		"./php/db/otsus_submit.php",
		{application_id:application_id, table_name:table_name, decision:decision, summa:summa, comment:comment}).done(function(data) {
			alert("Andmed: " + data);
		}
		);
	}
	</script>
</head>
<body>
	 <div class="content">
        <div class="chapter-header">
            <p>Projekti otsus</p>
			<button style="float: left;" type="button" class="btn btn-info" onclick="location.href='admin.php';">Tagasi admini lehele</button>
			<br>
			<br>
        </div>
		<div class="chapter">
			<div class="form-group">
				<label>Otsus: </label>
				<label class="radio-inline"><input type="radio" id="accepted" onclick="accepted()">Vastu võetud</label>
				<label class="radio-inline"><input type="radio" id="not_accepted" onclick="notAccepted()">Tagasi lükatud</label>
				<label class="radio-inline"><input type="radio" id="not_decided" onclick="notDecided()">Otsus tegemata</label>
            </div>
			<div class="form-group">
		      <label>Määratud summa:</label>
			  <input type="text" id="summa" class="form-control">
			<div class="form-group">
              <label>Kommentaar:</label>
              <input type="text" id="comment" class="form-control">
			</div>
			<div class="form-group">
			  <button type="button" class="btn btn-success" onclick="sendForm">Kinnita</button>
		</div>
		<script>
			function accepted() {
				document.getElementById('not_accepted').checked = false;
				document.getElementById('not_decided').checked = false;
			}
			function notAccepted() {
				document.getElementById('accepted').checked = false;
				document.getElementById('not_decided').checked = false;
			}
			function notDecided() {
				document.getElementById('accepted').checked = false;
				document.getElementById('not_accepted').checked = false;
			}
		</script>
	</body>
	</html>
	
	
	
	
	