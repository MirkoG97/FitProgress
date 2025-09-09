<?php
    namespace App\Models\User;
    
    class PersonalTrainer extends Utente{

        function __construct($nome, $cognome, $mail, $password, $ruolo, $id = null, $personal_trainer = null){
            parent::__construct($nome, $cognome, $mail, $password, $ruolo, $id, $personal_trainer);
        }

        function getClientiDB($id_personal_trainer){
            global $connessione; 
            $query = "  SELECT * 
                        FROM utente
                        WHERE idPersonalTrainer = ?";
            $stmt = $connessione->prepare($query);
            $stmt->execute([$id_personal_trainer]);

            $result = $stmt->get_result();

            $clienti = [];

            if ($result->num_rows > 0) {
                while ($cliente = $result->fetch_assoc()) {
                    $clienti[] = $cliente;
                }
            }

            //var_dump($clienti);

            if (!empty($clienti)) {
                return $clienti;
            } else {
                return null;
            }

        }
    }
?>