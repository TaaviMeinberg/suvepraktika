<?php
require './php/sessionCheck.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/googleAccount.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8">
    <meta name="google-signin-client_id" content="608677679448-ak55huh9omcppibuhh2t69iectp1r7ok.apps.googleusercontent.com">
</head>

<body onload="onLoad()">
    <div class="content">
        <div class="chapter-header">
            <p id="header">Uus taotlus</p>
            
        </div>
        <div class="chapter">
			<button class="btn btn-success" onclick="location.href='main.php';">Tagasi avalehele</button>
            <button type="button" class="btn btn-danger btn-small" onclick="signOut();" style="float: right; margin-right: 10px;">Logi välja</button>
            <center>
                <br>
                <br>
                <p style="font-style: italic;">Vali millist taotlust esitada</p>
                <button type="button" class="btn btn-info" onclick="location.href='tudengiprojekti_taotlus.php';">tudengiprojekti taotlus</button>
                <button type="button" class="btn btn-info" onclick="location.href='tudengiprojekti_aruandlus.php';">tudengiprojekti aruandlus</button>
                <button type="button" class="btn btn-info" onclick="location.href='teadusprojekti_aruandlus.php';">teadusprojekti aruandlus</button>
				<button type="button" class="btn btn-info" onclick="location.href='teadusprojekti_taotlus.php';">teadusprojekti taotlus</button>
                <br>
                <br>
            </center>
        </div>

    </div>
</body>

</html>
