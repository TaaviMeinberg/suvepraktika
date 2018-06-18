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
  <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
  <style>
    #detailed_content {
      margin-right: 10px;
    }
  </style>
</head>

<body>
  <div class="content">
    <div class="chapter-header">
      <p>Detailvaade</p>
    </div>
    <div class="chapter">
      <div id="detailed_content">

      </div>
      <center>
        <button type="button" class="btn btn-success" onclick="generatePDF()" style="margin-bottom: 10px;">Salvesta PDF</button>
      </center>
    </div>
  </div>
  <script>
    let doc = new jsPDF();
    let formId = window.location.href.split('?')[1].split('=')[1].split(',')[0];
    let tableName = window.location.href.split('?')[1].split('=')[1].split(',')[1];

    //First .post queries the application data from the database
    $.post("./php/db/formFunctions.php", { action: "detailed_content", formId: formId, tableName: tableName }, function (result) {
      //Second .post gets the application submitters email
      $.post("./php/db/detailview_check.php", { formId: formId, tableName: tableName }, function (applcationCreator) {
        //Third .post checks if current user is an admin or not: true/false
        $.post("./php/db/isUserAdmin.php", function (isAdmin) {
          //Finally, before loading the detailed data that was recieved from the first .post
          //it is checked if current user is admin OR if current user is the one who submitted the application
          if (isAdmin=="true" || applcationCreator == "<?php echo $_SESSION["userEmail"];?>") {
            document.getElementById("detailed_content").innerHTML = result;
          } else {
            alert("Teil puudub selle info vaatamiseks õigus");
            window.history.back();
          }
        });
      });
    });

    function generatePDF() {
      var pdf = new jsPDF('p', 'pt', 'letter');
      source = $('#detailed_content')[0];
      specialElementHandlers = {
        // element with id of "bypass" - jQuery style selector
        '#bypassme': function (element, renderer) {
          // true = "handled elsewhere, bypass text extraction"
          return true
        }
      };
      margins = {
        top: 80,
        bottom: 150,
        left: 40,
        width: 522
      };
      // all coords and widths are in jsPDF instance's declared units
      // 'inches' in this case
      pdf.fromHTML(
        source, // HTML string or DOM elem ref.
        margins.left, // x coord
        margins.top, { // y coord
          'width': margins.width, // max width of content on PDF
          'elementHandlers': specialElementHandlers
        },

        function (dispose) {
          pdf.save('taotlus.pdf');
        }, margins);
    }
  </script>
</body>

</html>