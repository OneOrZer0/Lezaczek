<?php

  if(session_status()==PHP_SESSION_ACTIVE){

  }else{
    session_start();
  }

  if(isset($_SESSION['logged'])&&$_SESSION['logged']['access']==1&&isset($_SESSION['idPlace'])&&$_SESSION['started']=="working"){

    echo "Udało się, możesz zacząć wypożycząć!";

    if(file_exists('./database.php')){
      require_once './database.php';
    }else{
      require_once '../database.php';
    }

    if(isset($_SESSION['idPlace'])&&isset($_POST['idButt'])){

      $idButt = $_POST['idButt'];

      $time = date("H:i");
      $dateNow = date("Y-m-d");

      $addLog=$db->prepare('INSERT INTO `history_one_day` (`id`, `id_user`, `id_place`, `operation`, `note`, `note_url`, `time`, `date`) VALUES (NULL, :idUser, :idPlace, :operation, "", "", :time, :date); ');

      if($idButt=="sun_SP"){
        $update=$db->prepare('UPDATE notepad SET sunbed=sunbed+1 WHERE id_place=:idPlace AND state_sun>sunbed');
      }else if($idButt=="sun_SM"){
        $update=$db->prepare('UPDATE notepad SET sunbed=sunbed-1 WHERE id_place=:idPlace AND sunbed>=1');
      }else if($idButt=="sun_DP"){
        $update=$db->prepare('UPDATE notepad SET sun_diner=sun_diner+1 WHERE id_place=:idPlace AND state_sun>sun_diner AND sun_diner<sunbed');
      }else if($idButt=="sun_DM"){
        $update=$db->prepare('UPDATE notepad SET sun_diner=sun_diner-1 WHERE id_place=:idPlace AND sun_diner>=1');
      }else if($idButt=="umb_UP"){
        $update=$db->prepare('UPDATE notepad SET umbrella=umbrella+1 WHERE id_place=:idPlace AND state_umb>umbrella');
      }else if($idButt=="umb_UM"){
        $update=$db->prepare('UPDATE notepad SET umbrella=umbrella-1 WHERE id_place=:idPlace AND umbrella>=1');
      }else if($idButt=="umb_DP"){
        $update=$db->prepare('UPDATE notepad SET umb_diner=umb_diner+1 WHERE id_place=:idPlace AND state_umb>umb_diner AND umb_diner<umbrella');
      }else if($idButt=="umb_DM"){
        $update=$db->prepare('UPDATE notepad SET umb_diner=umb_diner-1 WHERE id_place=:idPlace AND umb_diner>=1');
      }else if($idButt=="scr_SP"){
        $update=$db->prepare('UPDATE notepad SET screen=screen+1 WHERE id_place=:idPlace AND state_scr>screen');
      }else if($idButt=="scr_SM"){
        $update=$db->prepare('UPDATE notepad SET screen=screen-1 WHERE id_place=:idPlace AND screen>=1');
      }else if($idButt=="scr_DP"){
        $update=$db->prepare('UPDATE notepad SET scr_diner=scr_diner+1 WHERE id_place=:idPlace AND state_scr>scr_diner AND scr_diner<screen');
      }else if($idButt=="scr_DM"){
        $update=$db->prepare('UPDATE notepad SET scr_diner=scr_diner-1 WHERE id_place=:idPlace AND scr_diner>=1');
      }else{
        echo "Nieprawidłowy znacznik!";
        exit();
      }
      
      $update->bindValue(':idPlace', $_SESSION['idPlace'], PDO::PARAM_INT);
      
      if($update->execute()){

        $addLog->bindValue(':idUser', $_SESSION['logged']['id'], PDO::PARAM_INT);
        $addLog->bindValue(':idPlace', $_SESSION['idPlace'], PDO::PARAM_INT);
        $addLog->bindValue(':operation', $idButt, PDO::PARAM_STR);
        $addLog->bindValue(':time', $time, PDO::PARAM_STR);
        $addLog->bindValue(':date', $dateNow, PDO::PARAM_STR);

        if($addLog->execute()){

          if($addLog->rowCount()>0){
            require_once 'masterPoint.php';
            exit();
          }else{

          }
          
        }else{

        }

        require_once 'masterPoint.php';
        exit();

      }else{
        echo "Nie udało się dodać";
        exit();
      }

    }else{
      echo "Nie udało się zaktualizowac zeszytu!";
      exit();
    }

  }else{

  }

  echo "Działa!";
  echo $_POST['idButt'];

  require_once 'masterPoint.php';