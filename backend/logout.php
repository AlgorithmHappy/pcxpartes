<?php
    session_start();
    $arrClaves = array();
    foreach($_SESSION as $clave => $valor){
        array_push($arrClaves, $clave);
    }
    foreach($arrClaves as $it){
        unset($_SESSION[$it]);
    }
    header("Location: " . "../index.php");
?>