<?php

class Admin extends Utente
{

  function __construct($nome, $cognome, $mail, $password, $ruolo, $id = null, $personal_trainer = null)
  {
    parent::__construct($nome, $cognome, $mail, $password, $ruolo, $id, $personal_trainer);
  }
}
