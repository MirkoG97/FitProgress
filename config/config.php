<?php
    $host = "127.0.0.1";
    $user = "root";
    $password = "";
    $database = "fitprogress_db";

    $connessione = new mysqli($host, $user, $password, $database);

    if($connessione === false){
        die("Errore di connessione: ".$connessione->connect_error.'<br>');
    };

    echo "connessione effettuata <br>";
?>