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
    <script src="js/googleAccount.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="608677679448-ak55huh9omcppibuhh2t69iectp1r7ok.apps.googleusercontent.com">
	<meta http-equiv="content-type" content="application/vnd.ms-excel" charset="UTF-8">
      <script type="text/javascript">
      isAdmin();

    let counter=1;
      function addOneToTable() {
        var table = document.getElementById("admins");
        var row = table.insertRow(counter);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        cell1.innerHTML = '<input type="text" class="form-control" placeholder="">';
        cell2.innerHTML = '<input type="text" class="form-control" placeholder="">';
        counter++;
      }
      function removeOneFromTable() {
        if (counter>1) {
          document.getElementById("admins").deleteRow(counter-1);
          counter--;
        } else {
          alert("Rohkem ei saa eemaldada!");
        }
      }
    </script>
</head>

<body onload="onLoad()">
    <div class="content">
        <div class="chapter-header">
            <p id="header">Admin kasutajad</p>
            
        </div>
        <div class="chapter">
                
            <button type="button" class="btn btn-danger btn-small" onclick="signOut();" style="float: right; margin-right: 10px;">Logi välja</button>
		<button type="button" class="btn btn-info" onclick="location.href='admin.php';" style="float: left; margin-right: 10px;">Admin leht</button>
            <center>
                <br>
                <br>
                <?php 
                    echo "<p>Tere, " . $_SESSION["userName"] . ".</p>";
                ?>
                <hr>
				<label>Admin kasutajate lisamine</label>
                <div class="chapter">
				<table class="table table-bordered" id="admins">
					<thead>
					  <tr>
						<th>Kodaniku nimi</th>
						<th>Email</th>
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td><input type="text" class="form-control" placeholder=""></td>
						<td><input type="text" class="form-control" placeholder=""></td>
					  </tr>
					  <tr>
					  </tr>
					</tbody>
				</table>
			</div>
            </center>
        </div>
		<div class="chapter-header">
            <p id="header">Kõik admin kasutajad</p>
			</div>
        <div class="chapter">
			<p>
    </div>
</body>

</html>
