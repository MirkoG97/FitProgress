<?php
    require_once('../../config/config.php');
    require __DIR__ . '/../../vendor/autoload.php';

    use App\Models\Users\User;

    $mail = $connessione->real_escape_string($_POST['mail']);
    $password = $connessione->real_escape_string($_POST['password']);
    
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $user = User::getUtenteByLoginDB($mail, $password);
        if ($user) {
            $user->goToPrivateArea();
        }else{
            header("location: ../../public/login.html");
        }
    }
?>