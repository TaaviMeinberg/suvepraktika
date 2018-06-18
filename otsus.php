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
      </div>
			<div class="form-group">
		      <label>Määratud summa:</label>
			  <input type="text" id="amount" class="form-control">
			</div>
			<div class="form-group">
              <label>Kommentaar:</label>
              <input type="text" id="comment" class="form-control">
			</div>
			<div class="form-group">
							<label>Ettetasutud summa:</label>
							<input type="text" id="prePaid" class="form-control">
			</div>
			<div class="form-group">
							<label>Kinnita kuupäev:</label>
							<input type="date" id="confirm_date" class="form-control">
			</div>
			<div class="form-group">
			  <button type="button" class="btn btn-success" onclick="sendForm()">Kinnita</button>
			</div>
		</div>
	</div>


	<script type="text/javascript">
	document.getElementById('not_accepted').checked = true;
	function accepted() {
		document.getElementById('not_accepted').checked = false;
	}
	function notAccepted() {
		document.getElementById('accepted').checked = false;
	}
	var confirmOnly = false;
	var application_id = window.location.href.split('?')[1].split('=')[1].split(',')[0];
	var form_name = window.location.href.split('?')[1].split('=')[1].split(',')[1];
	$.post("./php/db/otsus_submit.php",
		{action:"askDecision", application_id:application_id, form_name:form_name}).done(function (result) {
			if (result) {
				confirmOnly = true;
				if (result.split(', ')[0]==1) {
					document.getElementById('accepted').checked = true;
					document.getElementById('not_accepted').checked = false;
				} else {
					document.getElementById('accepted').checked = false;
					document.getElementById('not_accepted').checked = true;
				}
				document.getElementById('accepted').disabled = true;
				document.getElementById('not_accepted').disabled = true;
				document.getElementById("amount").value = result.split(', ')[2];
				document.getElementById('amount').readOnly = true;
				document.getElementById("comment").value = result.split(', ')[3];
				document.getElementById('comment').readOnly = true;
				document.getElementById('prePaid').value = result.split(', ')[4];
				if (result.split(', ')[1]=="") {
					document.getElementById("confirm_date").disabled = false;
				} else {
					document.getElementById("confirm_date").value = result.split(', ')[1];
					document.getElementById("confirm_date").disabled = true;
				}
			}
		});
	function sendForm() {
			if (confirmOnly == false) {
				let decision = -1;
				if (document.getElementById('accepted').checked == true) {
					decision = 1;
				}
				if (document.getElementById('not_accepted').checked == true) {
					decision = -1;
				}
				let amount = document.getElementById("amount").value;
				let comment = document.getElementById("comment").value;
				let prePaid = document.getElementById("prePaid").value;
				$.post("./php/db/otsus_submit.php",
					{action:"saveDecision", application_id:application_id, form_name:form_name, decision:decision, amount:amount, comment:comment, prePaid:prePaid}).done(function(data) {
					alert("Andmed: " + data);
				});
			} else {
				let confirm_date = document.getElementById("confirm_date").value;
				let prePaid = document.getElementById("prePaid").value;
				$.post("./php/db/otsus_submit.php",
					{action:"saveConfirmation", application_id:application_id, form_name:form_name, confirm_date:confirm_date, prePaid:prePaid}).done(function(data) {
					alert("Andmed: " + data);
				});
			}
	}
	</script>
	</body>
	</html>
