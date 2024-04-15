<?php

  if(session_status()==PHP_SESSION_ACTIVE){

  }else{
    session_start();
  }

  if(isset($_SESSION['logged'])&&$_SESSION['logged']['access']==1&&isset($_SESSION['started'])&&($_SESSION['started']=="canStart"||$_SESSION['started']=="started")){

    if(file_exists('../database.php')){
      require_once '../database.php';
    }else{
      require_once './database.php';
    }

    if(isset($_POST['sunbeds'])){

      echo "Leżaki: ".$_SESSION['statusSunPoint']['sunbeds']."<br/>";
      echo "Parasole: ".$_SESSION['statusSunPoint']['umbrellas']."<br/>";
      echo "Parawany: ".$_SESSION['statusSunPoint']['screens']."<br/>";

      $stateGood=true;

      $lezaki=0;
      $parasole=0;
      $parawany=0;

      if(is_numeric($_POST['sunbeds'])) $lezaki = $_POST['sunbeds'];
      else{
        $_SESSION['errSun'] = '<span style="color: red">To nie jest liczba</span>';
        $stateGood=false;
      }

      if(is_numeric($_POST['umbrellas'])) $parasole = $_POST['umbrellas'];
      else{
        $_SESSION['errUmb'] = '<span style="color: red">To nie jest liczba</span>';
        $stateGood=false;
      }

      if(is_numeric($_POST['screens'])) $parawany = $_POST['screens'];
      else{
        $_SESSION['errScr'] = '<span style="color: red">To nie jest liczba</span>';
        $stateGood=false;
      }

      if($lezaki<=($_SESSION['statusSunPoint']['sunbeds'])&&$lezaki>0){
        echo "Jest w pytę <br/>";
      }else{
        $stateGood=false;
        $_SESSION['errSun'] = '<span style="color: red">Wprowadziłeś złą wartość</span>';
      }

      if($parasole<=($_SESSION['statusSunPoint']['umbrellas'])&&$parasole>0){
        echo "Jest w pytę <br/>";
      }else{
        $stateGood=false;
        $_SESSION['errUmb'] = '<span style="color: red">Wprowadziłeś złą wartość</span>';
      }

      if($parawany<=($_SESSION['statusSunPoint']['screens'])&&$parawany>0){
        echo "Jest w pytę <br/>";
      }else{
        $stateGood=false;
        $_SESSION['errScr'] = '<span style="color: red">Wprowadziłeś złą wartość</span>';
      }

      if($stateGood==true){ //JEZELI DANE SA POPRAWNE TO WSADZ JE DO BAZY NOTATNIK

        unset($_SESSION['statusSunPoint']);

        $getID=$db->prepare('SELECT id_place FROM planed WHERE id_user=:idUser');
        $getID->bindValue(':idUser', $_SESSION['logged']['id'], PDO::PARAM_INT);
        
        if($getID->execute()){
    
          if($getID->rowCount()>0){
    
            $get=$getID->fetch();
    
            $nowTime= date("Y-m-d H:i:s");
    
            //SPRAWDZA CZY NOTATNIK JUŻ ISTNIEJE

            echo "Działa?";
    
            $makeNote=$db->prepare('INSERT INTO `notepad` (`id`, `sunbed`, state_sun, `sun_diner`, `umbrella`, state_umb, `umb_deposit`, `umb_diner`, `screen`, state_scr, `scr_deposit`, `scr_diner`, `id_place`, `date`) VALUES (NULL, 0, :stateSun, 0, 0, :stateUmb, 0, 0, 0, :stateScr, 0, 0, :idPlace, :todayDate);');
            $makeNote->bindValue(':idPlace', $get['id_place'], PDO::PARAM_INT);
            $makeNote->bindValue(':stateSun', $lezaki, PDO::PARAM_INT);
            $makeNote->bindValue(':stateUmb', $parasole, PDO::PARAM_INT);
            $makeNote->bindValue(':stateScr', $parawany, PDO::PARAM_INT);
            $makeNote->bindValue(':todayDate', $nowTime, PDO::PARAM_STR);
            if($makeNote->execute()){
    
              if($makeNote->rowCount()>0){
    
                $update=$db->prepare('UPDATE `planed` SET `status` = "working" WHERE `planed`.`id_place`=:idPlace AND planed.id_user=:idUser;'); //jezeli chociaż u jednego pracownika stanowisko jest otwarte to znaczy ze jest otwarte
                $update->bindValue(':idPlace', $get['id_place'], PDO::PARAM_INT);
                $update->bindValue(':idUser', $_SESSION['logged']['id'], PDO::PARAM_INT);
    
                if($update->execute()){
                  $_SESSION['started']="working";
                  echo "Już jest ustawione!";

                  require_once 'masterPoint.php'; //TUTAJ PRZECHODZI PO OGARNIĘCIU WSZYTKIEGO!

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

      }else{

        require_once 'firstStep.php';
        exit();
      }

    }else{

    }

    if($_SESSION['started']=="canStart"){
      $_SESSION['started']="started"; //Zmienia się wartośc zmiennej po to aby po odświerzeniu strony wyswietlil sie odpowiedni panel w przypadku braku internetu
    }else{

    }

    //Jeżeli ktoś już tutaj wlazł na close musi się zmienić na opened

    $startedCount=false;

    //Wprowadzanie danych o ilości

    //Dodatkowo sprawdza czy już ktoś nie liczy, sprawdza czy któryś z członków nie ma tego samego statusu czyli "working" jeżeli ma to mu się też na taki zmienia i może miec podgląd do stanu

    if($_SESSION['started']=='started'){

      //SPRAWDZA CZY JUŻ PRACUJESZ

      $checkWorker=$db->prepare('SELECT status FROM planed WHERE id_user=:idUser');
      $checkWorker->bindValue(':idUser', $_SESSION['logged']['id'], PDO::PARAM_INT);

      if($checkWorker->execute()){

        if($checkWorker->rowCount()>0){

          $chW=$checkWorker->fetch();

          if($chW['status']=="working"){
            $_SESSION['started']="working";

            if(file_exists('./work/masterPoint.php')){
              require_once './work/masterPoint.php';
              exit();
            }else{
              require_once './masterPoint.php';
              exit();
            }

          }else if($chW['status']=="support"){
            $_SESSION['started']="support";

            if(file_exists('./work/supportPoint.php')){
              require_once './work/supportPoint.php';
              exit();
            }else{
              require_once './supportPoint.php';
              exit();
            }
            
          }else{

          }

        }else{

        }

      }else{

      }

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

              echo "Aktualnie ktoś już liczy stan stanowiska, musisz poczekać ";

            }else{
              //sprawdza czy już policzone i ktoś pracuje
              $checkStart=$db->prepare('SELECT id FROM planed WHERE id_place=:idPlace AND status="working"');
              $checkStart->bindValue(':idPlace', $idP['id_place'], PDO::PARAM_INT);

              if($checkStart->execute()){

                if($checkStart->rowCount()>0){

                  //Jeżeli ktoś już policzył i pracuje ustaw jako support

                  $updateStart=$db->prepare('UPDATE planed SET status="support" WHERE id_user=:idUser AND id_place=:idPlace');
                  $updateStart->bindValue(':idPlace', $idP['id_place'], PDO::PARAM_INT);
                  $updateStart->bindValue(':idUser', $_SESSION['logged']['id'], PDO::PARAM_INT);

                  if($updateStart->execute()){

                    echo "Ustawiono Cię na Supporta!";

                    $_SESSION['started']="support";

                    if(file_exists('./supportPoint.php')){
                      require_once './supportPoint.php';
                      exit();
                    }else{
                      require_once './work/supportPoint.php';
                      exit();
                    }  

                  }else{

                    echo "Nie udało się wykonac zadania :(";

                  }

                }else{ //Jeżeli jeszcze nikt nie liczył a ty jesteś pierwszy, ustawia cię na liczącego

                  $updateStart=$db->prepare('UPDATE planed SET status="counted" WHERE id_user=:idUser AND id_place=:idPlace');
                  $updateStart->bindValue(':idPlace', $idP['id_place'], PDO::PARAM_INT);
                  $updateStart->bindValue(':idUser', $_SESSION['logged']['id'], PDO::PARAM_INT);

                  if($updateStart->execute()){

                    echo "Ustawiono Cię na Liczącego!";

                  }else{

                    echo "Nie udało się wykonac zadania :(";

                  }

                }

              }else{

              }

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

                  //require_once 'firstStep.php';
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

          }else if($c['status']=="support"){
            echo "Ktos już liczy, musisz poczekać aż skończy";

            //tutaj kod dla pomocnika

          }else if($c['status']=="working"){

            //tutaj kod dla tego co liczył stan, on ma mieć dostęp do zeszytu apliakcji

          }else{

          }
          
          //require_once 'firstStep.php';

        }else{ //jeżeli dla zalogowanego użytkownika nie ma opened to teraz sprawdź czy jest dla kogoś innego
          //Już ktoś liczy, musisz poczekac czy juz policzył
        }

      }else{

      } 

      //Jeżeli ktoś liczy a druga osoba rozpocznie, nic się nie wydaży

    }else if($_SESSION['started']=='working'&&false){ //Jeżeli już policzono plaety i zmienna zmieniła wartośc na working co znaczy ze policzone i rozpoczeta sprzedarz

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

    echo "Wykonane";

  }else if(isset($_SESSION['logged'])&&$_SESSION['logged']['access']==1&&isset($_SESSION['started'])&&$_SESSION['started']=="working"){
    echo "Nie wejdzieszss";
  }else{
    echo "Nie wejdziesz";
  }

  echo "Działass";