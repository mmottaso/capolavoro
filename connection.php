<?php
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "capolavorofante";

    $conn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);

    if(!$conn){
        echo "connessione fallita";
    }
?>