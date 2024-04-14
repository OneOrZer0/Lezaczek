<?php

  if(session_status()==PHP_SESSION_ACTIVE){

  }else{
    session_start();
  }

  unset($_SESSION['logged']);
  unset($_SESSION['started']);
  header('Location: index.php');
  exit();