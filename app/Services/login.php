<?php
    require_once('../models/class.php');

    $mail = $connessione->real_escape_string($_POST['mail']);
    $password = $connessione->real_escape_string($_POST['password']);
    
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $utente = Utente::getUtenteByLoginDB($mail, $password);
        if ($utente) {
            $utente->goToPrivateArea();
        }else{
            header("location: ../../public/login.html");
        }
    }
?>