<?php
    require_once('../../config/config.php');
    require __DIR__ . '/../../vendor/autoload.php';

    use App\Models\User\Utente;

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