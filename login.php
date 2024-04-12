<?php

  if(session_status()==PHP_SESSION_ACTIVE){
    
  }else{

    session_start();

  }
  
  if(!isset($_SESSION['logged'])){

    require_once 'database.php';

    $login=$_POST['login'];
    $haslo=$_POST['haslo'];

    $good=true;

    if(empty($login)||$login==""){

      $_SESSION['errLogin']='<span style="color: red;">Nie wpisano hasła!</span>';
      $good=false;

    } 
    
    if(empty($haslo)||$haslo==""){

      $_SESSION['errPass']='<span style="color: red">Nie wpisano Loginu!</span>';
      $good=false;

    }

    if($good==false){

      header('Location: index.php');
      exit();

    }else{
      
      //echo $hasPass=password_hash($haslo,PASSWORD_DEFAULT);
      //exit();
      $check=$db->prepare('SELECT * FROM users WHERE email=:login');
      $check->bindValue(':login', $login, PDO::PARAM_STR);
      //$check->bindValue(':password',$hasPass, PDO::PARAM_STR);
      //$check->execute();

      if($check->execute()){

        if($check->rowCount()>0){

          $allData=$check->fetch();

          if(password_verify($haslo,$allData['pass'])){
            
            $_SESSION['logged']=['id'=>$allData['id'],'access'=>$allData['access']];
            header('Location: workerSpace.php');
            exit();

          }else{

            $_SESSION['error'] = '<span style="color: red;">Nie udało się zalogować nie działa!';
            header('Location: index.php');
            exit();

          }

        }else{

          $_SESSION['error'] = '<span style="color: red;">Nie udało się zalogować!';
          header('Location: index.php');
          exit();

        }
      }else{

        $_SESSION['error'] = "Nie udało wykonac się zadania";
        header('Location: index.php');
        exit();

      }

      $_SESSION['error'] = "Tutaj";
      header('Location: index.php');
      exit();
    }

  }else{
    $_SESSION['error'] = "TTTT";
    header('Location: workerSpace.php');
    exit();
  }