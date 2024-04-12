<?php
  
  if(session_status()==PHP_SESSION_ACTIVE){

  }else{
    session_start();
  }

  if(isset($_SESSION['logged'])){

    if($_SESSION['logged']['access']=="7"){

      echo "Poziom 7";
      require_once 'control7.php';
      
    }else if($_SESSION['logged']['access']=="4"){

      echo "Poziom 4";
      require_once 'control4.php';

    }else if($_SESSION['logged']['access']=="1"){

      echo "Poziom 1";
      require_once 'control1.php';

    }else{

    }

  }else{
    header('Location: index.php');
    exit();
  }