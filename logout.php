<?php

  if(session_status()==PHP_SESSION_ACTIVE){

  }else{
    session_start();
  }

  unset($_SESSION['logged']); //tablica z danymi zalogowanego użytkownika
  unset($_SESSION['started']); //status dostępu pracownika, roździela role
  unset($_SESSION['statusSunPoint']); 
  unset($_SESSION['idPlace']); //id miejsca w którym aktulanie pracuje pracownik
  header('Location: index.php');
  exit();