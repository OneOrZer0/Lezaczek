<?php

  if(session_status()==PHP_SESSION_ACTIVE){

  }else{
    session_start();
  }

  if(isset($_SESSION['logged'])&&$_SESSION['logged']['access']==1&&isset($_SESSION['started'])&&($_SESSION['started']=="canStart"||$_SESSION['started']=="started")){

    require_once '../database.php';

    if($_SESSION['started']=="canStart"){
      $_SESSION['started']="started"; //Zmienia się wartośc zmiennej po to aby po odświerzeniu strony wyswietlil sie odpowiedni panel w przypadku braku internetu
    }else{

    }

    //Jeżeli ktoś już tutaj wlazł na close musi się zmienić na opened

    $startedCount=false;

    //Wprowadzanie danych o ilości

    //Dodatkowo sprawdza czy już ktoś nie liczy, sprawdza czy któryś z członków nie ma tego samego statusu czyli "working" jeżeli ma to mu się też na taki zmienia i może miec podgląd do stanu

    if($_SESSION['started']=='started'){

      //ustawia status na "liczenie"
      $idPlaned=$db->prepare('SELECT id_place FROM planed WHERE id_user=:idUser'); //sprawdzić czy ktoś liczy czy jest policzone jeżeli tak ustawic zmienną sesyjną na "worked"
      $idPlaned->bindValue(':idUser', $_SESSION['logged']['id'], PDO::PARAM_INT);
      
      if($idPlaned->execute()){

        if($idPlaned->rowCount()>0){

          $idP=$idPlaned->fetch();

          $checkCount=$db->prepare('SELECT id FROM planed WHERE id_place=:idPlace AND status="counted"');
          $checkCount->bindValue(':idPlace', $idP['id_place'], PDO::PARAM_INT);

          if($checkCount->execute()){

            if($checkCount->rowCount()>0){ //znaczy to że ktoś już liczy

              $startedCount=true;

            }else{
              //sprawdza czy już policzone i ktoś pracuje
            }

          }else{

          }

        }else{

        }

      }else{

      }

      $count=$db->prepare('SELECT status FROM planed WHERE id_user=:idUser'); //sprawdzić czy ktoś liczy czy jest policzone jeżeli tak ustawic zmienną sesyjną na "worked"
      $count->bindValue(':idUser', $_SESSION['logged']['id'], PDO::PARAM_INT);
      
      if($count->execute()){

        if($count->rowCount()>0){

          $c=$count->fetch();

          if($c['status']=="opened"&&$startedCount==false){ //druga zmienna oznacza czy ktoś juz liczy
            $getID=$db->prepare('SELECT id_place FROM planed WHERE id_user=:idUser');
            $getID->bindValue(':idUser', $_SESSION['logged']['id'], PDO::PARAM_INT);
            
            if($getID->execute()){
        
              if($getID->rowCount()>0){
    
                $update=$db->prepare('UPDATE `planed` SET `status` = "counted" WHERE `planed`.`id_place`=:idPlace AND planed.id_user=:idUser;'); //jezeli chociaż u jednego pracownika stanowisko jest otwarte to znaczy ze jest otwarte
                $update->bindValue(':idPlace', $get['id_place'], PDO::PARAM_INT);
                $update->bindValue(':idUser', $_SESSION['logged']['id'], PDO::PARAM_INT);
    
                if($update->execute()){
                  $_SESSION['started']="working";
                  echo "Już jest ustawione!";

                  require_once 'firstStep.php';
                }else{
                  echo "Nie udało się zaktualizować!";
                }
    
              }else{
    
              }
    
            }else{
    
            }
          }else if($c['status']=="counted"){
    
            echo "Znaczy to tyle że jesteś osobą która liczy a druga czeka aż skończysz";

            require_once 'firstStep.php';

          }else if($c['status']=="helper"){
            echo "Ktos już liczy, musisz poczekać aż skończy";

            //tutaj kod dla pomocnika

          }else if($c['status']=="worker"){

            //tutaj kod dla tego co liczył stan, on ma mieć dostęp do zeszytu apliakcji

          }else{

          }
          
          //require_once 'firstStep.php';

        }else{ //jeżeli dla zalogowanego użytkownika nie ma opened to teraz sprawdź czy jest dla kogoś innego
          //Już ktoś liczy, musisz poczekac czy juz policzył
        }

      }else{

      } 

    }else if($_SESSION['started']=='working'){ //Jeżeli już policzono plaety i zmienna zmieniła wartośc na working co znaczy ze policzone i rozpoczeta sprzedarz

      $getID=$db->prepare('SELECT id_place FROM planed WHERE id_user=:idUser');
      $getID->bindValue(':idUser', $_SESSION['logged']['id'], PDO::PARAM_INT);
      
      if($getID->execute()){
  
        if($getID->rowCount()>0){
  
          $get=$getID->fetch();
  
          $nowTime= date("Y-m-d H:i:s");
  
          //SPRAWDZA CZY NOTATNIK JUŻ ISTNIEJE
  
          $makeNote=$db->prepare('INSERT INTO `notepad` (`id`, `sunbed`, `sun_diner`, `umbrella`, `umb_deposit`, `umb_diner`, `screen`, `scr_deposit`, `scr_diner`, `id_place`, `date`) VALUES (NULL, 0, 0, 0, 0, 0, 0, 0, 0, :idPlace, :todayDate);');
          $makeNote->bindValue(':idPlace', $get['id_place'], PDO::PARAM_INT);
          $makeNote->bindValue(':todayDate', $nowTime, PDO::PARAM_STR);
          if($makeNote->execute()){
  
            if($makeNote->rowCount()>0){
  
              $update=$db->prepare('UPDATE `planed` SET `status` = "opened" WHERE `planed`.`id_place`=:idPlace AND planed.id_user=:idUser;'); //jezeli chociaż u jednego pracownika stanowisko jest otwarte to znaczy ze jest otwarte
              $update->bindValue(':idPlace', $get['id_place'], PDO::PARAM_INT);
              $update->bindValue(':idUser', $_SESSION['logged']['id'], PDO::PARAM_INT);
  
              if($update->execute()){
                $_SESSION['started']="working";
                echo "Już jest ustawione!";
              }else{
                echo "Nie udało się zaktualizować!";
              }
  
            }else{
              echo "Nie udało się utworzyć notatnika!";
            }
  
          }else{
            echo "Nie udało się wykonac zapytania";
          }
  
        }else{
          echo "Nie pobrano żadnych danych!";
        }
  
      }else{
        echo "Nie udało się zapytania wykonać!";
      }
    }
    //wyswietla się spis stanu wypożyczalni

  }else if(isset($_SESSION['logged'])&&$_SESSION['logged']['access']==1&&isset($_SESSION['started'])&&$_SESSION['started']=="working"){

  }else{

  }

  echo "Działa";