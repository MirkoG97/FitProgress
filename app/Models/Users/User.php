<?php
    namespace App\Models\Users;

    abstract class User {
        public ?int $id;
        public string $nome;
        public string $cognome;
        public string $mail;
        public string $password;
        public int $ruolo;

        public function __construct(string $nome, string $cognome, string $mail, string $password, int $ruolo, ?int $id = null){
            $this->id = $id;
            $this->nome = $nome;
            $this->cognome = $cognome;
            $this->mail = $mail;
            $this->password = $password;
            $this->ruolo = $ruolo;
        }

        function insertUserintoDB(){
            global $connessione; 
            $query = "  INSERT INTO utente (nome, cognome, mail, password, idRuolo) 
                        VALUES (?,?,?,?,?)";
            $stmt = $connessione->prepare($query);
            $result = $stmt->execute([$this->nome, $this->cognome, $this->mail, $this->password, $this->ruolo]);
            if (!$result) {
                echo "Nessuna riga inserita <br>";
            }
        }

        static function getUtenteByLoginDB(string $mail, string $password){
            global $connessione; 
            $query = "  SELECT * 
                        FROM utente
                        WHERE mail = ?
                        LIMIT 1";
            $stmt = $connessione->prepare($query);
            $stmt->execute([$mail]);

            $result = $stmt->get_result();
            $utente = $result->fetch_assoc();
            
            if ($utente && password_verify($password, $utente['password'])) {
                return self::switchUsers($utente['idRuolo'], $utente);
            } else {
                return null;
            }
        }

        static function getUtenteByIdDB(int $id){
            global $connessione; 
            $query = "  SELECT * 
                        FROM utente
                        WHERE id = ?
                        LIMIT 1";
            $stmt = $connessione->prepare($query);
            $stmt->execute([$id]);

            $result = $stmt->get_result();
            $utente = $result->fetch_assoc();
            //var_dump($utente);

            //$stmt->close();
            //$connessione->close();
            
            if ($utente) {
                return self::switchUsers($utente['idRuolo'], $utente);
            } else {
                return null;
            }
        }

        function goToPrivateArea(){
            session_start();

            $_SESSION['id'] = $this->id;
            $_SESSION['nome'] = $this->nome;
            $_SESSION['ruolo'] = $this->ruolo;
            $_SESSION['logged'] = true;

            session_regenerate_id(true); //Per prevenire il session fixation

            switch($_SESSION['ruolo']){
                case 1:
                    header("location: ../../scripts/adminPrivateArea.php");
                    break;

                case 3:
                    header("location: ../../scripts/personalTrainerPrivateArea.php");
                    break;

                default:
                    header("location: ../../scripts/userPrivateArea.php");
                    break;
            }
        }

        private static function switchUsers(int $idRuolo, array $utente){
            switch($idRuolo){
                case 1:
                    return new Admin(
                        $utente['nome'],
                        $utente['cognome'],
                        $utente['mail'],
                        $utente['password'],
                        $utente['idRuolo'],
                        $utente['id']
                    );
                    break;

                case 3:
                    return new PersonalTrainer(
                        $utente['nome'],
                        $utente['cognome'],
                        $utente['mail'],
                        $utente['password'],
                        $utente['idRuolo'],
                        $utente['id']
                    );
                    break;

                default:
                    return new BasicUser(
                        $utente['nome'],
                        $utente['cognome'],
                        $utente['mail'],
                        $utente['password'],
                        $utente['idRuolo'],
                        $utente['id']
                    );
                    break;
            }
        }
    }
?>