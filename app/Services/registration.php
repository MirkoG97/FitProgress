<?php
    require_once('../../config/config.php');
    require __DIR__ . '/../../vendor/autoload.php';

    use App\Models\Users\BasicUser;

    $nome = $connessione->real_escape_string($_POST['nome']);
    $cognome = $connessione->real_escape_string($_POST['cognome']);
    $mail = $connessione->real_escape_string($_POST['mail']);
    $password = password_hash($connessione->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
    
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $user = new BasicUser($nome, $cognome, $mail, $password, 2);
        $user->insertUserintoDB();
        if ($user) {
            $user->goToPrivateArea();
        }
    }
?>