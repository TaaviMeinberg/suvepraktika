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
    <meta name="google-signin-client_id" content="608677679448-ak55huh9omcppibuhh2t69iectp1r7ok.apps.googleusercontent.com">
    <script>
        isAdmin();
    </script>
</head>

<body onload="onLoad()">
    <div class="content">
        <div class="chapter-header">
            <p id="header">ADMIN leht</p>
            
        </div>
        <div class="chapter">
                
            <button type="button" class="btn btn-danger btn-small" onclick="signOut();" style="float: right; margin-right: 10px;">Logi välja</button>
            <button type="button" class="btn btn-info" onclick="location.href='adminKasutajad.php';" style="float: left; margin-right: 10px;">Halda adminne</button>
            <center>
                <br>
                <br>
                <?php 
                    echo "<p>Tere, " . $_SESSION["userName"] . ".</p>";
                ?>
                <hr>
                <p style="font-style: italic;">Siia kuvatakse kõik esitatud taotlused</p>
                <br>
                <br>
            </center>
        </div>

    </div>
</body>

</html>
