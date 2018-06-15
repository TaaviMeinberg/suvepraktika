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
                <select class="form-control" style="margin-right: 10px" id="" onchange="changeFilter(this)">
                  <option value="all" selected>Kõik</option>
                  <option value="M1">M1</option>
                  <option value="M2">M2</option>
                  <option value="M3">M3</option>
                </select>
                <br>
                <div style="margin-right: 10px;" class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="admins">
                        <thead>
                        <tr>
                            <th>Loomise kuupäev</th>
                            <th>Liik</th>
                            <th>Nimi</th>
                            <th>Tegevused</th>
                        </tr>
                        </thead>
                        <tbody style="margin-right: 10px;"id="list" >
                        </tbody>
                    </table>
                </div>
            </center>
        </div>

    </div>
    <script>
        $.post("./php/db/formFunctions.php", {action:"listAllSubmissions"}, function(result){
            $('#list').append (result);
			$("button[name*='markAsDeleted']").hide();
        });

        function showDetailView(){
            $("button[name*='detailView']").on('click', function(event){
                window.location = "detailedView.html?id="+event.target.id+"";
            });
        }
        function changeFilter(m) {
          for (var i = 0; i < document.getElementById('list').getElementsByTagName('TR').length; i++) {
            document.getElementById('list').getElementsByTagName('TR')[i].style.display = "table-row";
          }
          if (m.value != 'all') {
            for (var i = 0; i < document.getElementById('list').getElementsByTagName('TR').length; i++) {
              if (document.getElementById('list').getElementsByTagName('TR')[i].id != m.value) {
                document.getElementById('list').getElementsByTagName('TR')[i].style.display = "none";
              }
            }
          }
        }
    </script>
</body>

</html>
