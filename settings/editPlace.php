<div>Działa</div>
<?php
  if(session_status()==PHP_SESSION_ACTIVE){

  }else{
    session_start();
  }

  if(!isset($_SESSION['logged'])||$_SESSION['logged']['access']<4){
    header('Location: index.php');
    exit();
  }else{
    
  }