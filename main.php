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
</head>

<body onload="onLoad()">
    <div class="content">
        <div class="chapter-header">
            <p id="header">Pealeht</p>

        </div>
        <div class="chapter">
                <button type="button" class="btn btn-success btn-small" onclick="location.href='uusTaotlus.php';" style="float: left;">Esita uus taotlus</button>
            <button type="button" class="btn btn-danger btn-small" onclick="signOut();" style="float: right; margin-right: 10px;">Logi välja</button>
            <center>
                <br>
                <br>
                <?php
                    echo "<p>Tere, " . $_SESSION["userName"] . ".</p>";
                ?>
                <hr>
                <p style="font-style: italic;">Siia kuvatakse Sinu esitatud taotlused</p>
                <div style="margin-right: 10px;" class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="admins">
                        <thead>
                        <tr>
                            <th>Loomise kuupäev</th>
                            <th>Liik</th>
                            <th>Nimi</th>
                            <th>Otsuse staatus</th>
                            <th>Kinnituse staatus</th>
                            <th>Taoteldud summa</th>
                            <th>Määratud summa</th>
                            <th>Tegevused</th>
                        </tr>
                        </thead>
                        <tbody id="list">
                        </tbody>
                    </table>
                </center>
                </div>
        </div>

    </div>
    <script>
		
        $.post("./php/db/formFunctions.php", {action:"listUserSubmissions"}, function(result){
            $('#list').append (result);
            $("button[name*='markAsDeleted']").on('click', function(event){
                var idAndTableName = event.target.id.split(",")
                var id = Number(idAndTableName[0]);
                var tableName = idAndTableName[1];
                $.post("./php/db/formFunctions.php", {action:"markDeleted",entryID:id,tableName:tableName}, function(result){
                    location.reload();
                });
            });
            $("button[name*='detailView']").on('click', function(event){
                window.location = "detailedView.php?id="+event.target.id+"";
            });
        });
        
    </script>
</body>

</html>
