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
    echo "<div>ID Imie Nazwisko Telefon Status</div>";

    require_once '../database.php';

    $load=$db->query('SELECT id, name, surname, tel, status FROM users WHERE access=1');

    if($load->rowCount()>0){
      $listUser=$load->fetchAll();

      foreach($listUser as $li){
        echo $li['id'].' | '.$li['name'].' | '.$li['surname'].' | '.$li['tel'].' | '.$li['status'].'<br/>';
      }

    }else{
      echo "Nikogo nie znaleziono!";
    }
  }