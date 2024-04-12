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
    echo "<div>ID Imie Nazwisko Emial Telefon Pesel Miasto Ulica NumerDomu/mieszkania Status</div>";

    require_once '../database.php';

    $load=$db->query('SELECT * FROM users WHERE access=1');

    if($load->rowCount()>0){
      $listUser=$load->fetchAll();

      foreach($listUser as $li){
        echo $li['id'].' | '.$li['name'].' | '.$li['surname'].' | '.$li['email'].' | '.$li['tel'].' | '.$li['pesel'].' | '.$li['city'].' | '.$li['street'].' | '.$li['nr_home'].' | '.$li['status'].'<br/>';
      }

    }else{
      echo "Nikogo nie znaleziono!";
    }
  }