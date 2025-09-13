<?php
    namespace App\Models\Users;

    class BasicUser extends User{
        public function __construct(string $nome, string $cognome, string $mail, string $password, int $ruolo, ?int $id = null) {
            parent::__construct($nome, $cognome, $mail, $password, $ruolo, $id);
        }

    }
?>