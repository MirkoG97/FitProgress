<?php
    namespace App\Models\Users;
    
    class PersonalTrainer extends User{

        public function __construct(string $nome, string $cognome, string $mail, string $password, int $ruolo, ?int $id = null) {
            parent::__construct($nome, $cognome, $mail, $password, $ruolo, $id);
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