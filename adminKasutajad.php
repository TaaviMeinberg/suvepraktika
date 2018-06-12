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
            <div class="chapter" id="list">
            </div>
    </div>
    <script> 
        isAdmin();
        $.post("./php/db/adminFunctions.php", {action:"listAllAdmins"}, function(result){
            $('#list').html(result);

            $(".btn-sm").on('click', function(event){
                $.post("./php/db/adminFunctions.php", {action:"removeAdmin", adminID:event.target.id}, function(){
                    location.reload();
                });
            });
        });
        
    </script>
</body>

</html>
