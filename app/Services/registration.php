<?php
    require_once('../../config/config.php');
    require __DIR__ . '/../../vendor/autoload.php';

    use App\Models\User\Utente;

    $nome = $connessione->real_escape_string($_POST['nome']);
    $cognome = $connessione->real_escape_string($_POST['cognome']);
    $mail = $connessione->real_escape_string($_POST['mail']);
    $password = password_hash($connessione->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
    
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $utente = new Utente($nome, $cognome, $mail, $password, 2);
        $utente->inserimentoUtenteDB();
        if ($utente) {
            $utente->goToPrivateArea();
        }
    }
?>