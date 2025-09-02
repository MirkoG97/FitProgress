<?php
    header('Content-Type: application/json');
    require_once('../models/class.php');

    session_start();

    $response = [];

    if(!isset($_SESSION['logged']) || $_SESSION['logged'] !== true){
        http_response_code(401);
        $response['error'] = 'Accesso non autorizzato. Effettua il login.';
        echo json_encode($response);
        exit;
    }
    
    $utente = Utente::getUtenteByIdDB($_SESSION['id']);

    $clienti = [];

    if ($utente) {
        $clienti = $utente->getClientiDB($_SESSION['id']);
        if ($clienti !== false) { 
            $response['data'] = $clienti;
            $response['success'] = true;
        } else {
            http_response_code(500);
            $response['error'] = 'Errore nel recupero dei clienti.';
        }
    }else{
        http_response_code(404); // Not Found
        $response['error'] = 'Utente non trovato.';
    }

    echo json_encode($response);
?>