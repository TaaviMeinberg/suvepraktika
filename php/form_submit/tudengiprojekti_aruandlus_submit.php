<?php
function submitForm(){

  $mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);

  //$stmt = $mysqli->prepare("INSERT INTO vp1users (firstname, lastname, birthday, gender, email, password) VALUES (?, ?, ?, ?, ?, ?)");
  echo $mysqli->error;

  //$stmt->bind_param("sssiss", $signupFirstName, $signupFamilyName, $signupBirthDate, $gender, $signupEmail, $signupPassword);
  if ($stmt->execute()){
    echo "\n Õnnestus!";
  } else {
    echo "\n Tekkis viga : " .$stmt->error;
  }
  $stmt->close();
  $mysqli->close();
}
 ?>
