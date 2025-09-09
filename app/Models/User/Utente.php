<?php
    namespace App\Models\User;
    use App\Models\User\Admin;
    use App\Models\User\PersonalTrainer;
    //require_once('../../config/config.php');

    class Utente{
        public $id;
        public $nome;
        public $cognome;
        public $mail;
        public $password;
        public $ruolo;
        public $personal_trainer;

        function __construct($nome, $cognome, $mail, $password, $ruolo, $id = null, $personal_trainer = null){
            $this->id = $id;
            $this->nome = $nome;
            $this->cognome = $cognome;
            $this->mail = $mail;
            $this->password = $password;
            $this->ruolo = $ruolo;
            $this->personal_trainer = $personal_trainer;
        }

        function inserimentoUtenteDB(){
            global $connessione; 
            $query = "  INSERT INTO utente (nome, cognome, mail, password, idRuolo) 
                        VALUES (?,?,?,?,?)";
            $stmt = $connessione->prepare($query);
            $result = $stmt->execute([$this->nome, $this->cognome, $this->mail, $this->password, $this->ruolo]);
            if (!$result) {
                echo "Nessuna riga inserita <br>";
            } 
            //$stmt->close();
            //$connessione->close();
        }

        static function getUtenteByLoginDB($mail, $password){
            global $connessione; 
            $query = "  SELECT * 
                        FROM utente
                        WHERE mail = ?
                        LIMIT 1";
            $stmt = $connessione->prepare($query);
            $stmt->execute([$mail]);

            $result = $stmt->get_result();
            $utente = $result->fetch_assoc();
            //var_dump($utente);

            //$stmt->close();
            //$connessione->close();
            
            if ($utente && password_verify($password, $utente['password'])) {
                return new Utente(
                    $utente['nome'],
                    $utente['cognome'],
                    $utente['mail'],
                    $utente['password'],
                    $utente['idRuolo'],
                    $utente['id'] ?? null,
                    $utente['idPersonalTrainer'] ?? null
                );
            } else {
                return null;
            }
        }

        function goToPrivateArea(){
            session_start();

            $_SESSION['id'] = $this->id;
            $_SESSION['nome'] = $this->nome;
            $_SESSION['ruolo'] = $this->ruolo;
            $_SESSION['personal_trainer'] = $this->personal_trainer;
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

        static function getUtenteByIdDB($id){
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

                switch($_SESSION['ruolo']){
                    case 1:
                        return new Admin(
                            $utente['nome'],
                            $utente['cognome'],
                            $utente['mail'],
                            $utente['password'],
                            $utente['idRuolo'],
                            $utente['id'],
                            $utente['idPersonalTrainer'] ?? null
                        );
                        break;

                    case 3:
                        return new PersonalTrainer(
                            $utente['nome'],
                            $utente['cognome'],
                            $utente['mail'],
                            $utente['password'],
                            $utente['idRuolo'],
                            $utente['id'],
                            $utente['idPersonalTrainer'] ?? null
                        );
                        break;

                    default:
                        return new Utente(
                            $utente['nome'],
                            $utente['cognome'],
                            $utente['mail'],
                            $utente['password'],
                            $utente['idRuolo'],
                            $utente['id'],
                            $utente['idPersonalTrainer'] ?? null
                        );
                        break;
                }
            } else {
                return null;
            }
        }
    }
?>