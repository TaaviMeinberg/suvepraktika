<?php
session_start();
if($_POST["sessionStatus"]=="create"){
    $_SESSION["userName"] = $_POST["userName"]; 
    $_SESSION["userEmail"] = $_POST["userEmail"];
}else if($_POST["sessionStatus"]=="destroy"){
    session_unset(); 
    session_destroy(); 
}



?>