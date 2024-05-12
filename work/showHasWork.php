<?php

  if(session_status()==PHP_SESSION_ACTIVE){

  }else{

    session_start();

  }

  if(isset($_SESSION['logged'])&&$_SESSION['logged']['access']==1){

    require_once 'database.php';

    $check=$db->prepare('SELECT citys.city, places.street, places.mark FROM users, planed, places, citys WHERE planed.id_user=:idUser AND planed.id_place=places.id AND users.id=:idUserA AND citys.id=places.id_city;');
    $check->bindValue(':idUser', $_SESSION['logged']['id'], PDO::PARAM_INT);
    $check->bindValue(':idUserA', $_SESSION['logged']['id'], PDO::PARAM_INT);

    if($check->execute()){

      if($check->rowCount()>0){

        $ch=$check->fetch();

        echo<<<end

          <div class="row noMarg">
            <div class="col-12 noPadd">
              <h4>Twój przydział</h4>
            </div>
            <div class="col-4 inside-padd-one-call">
              <div class="one-call">{$ch['city']}</div>
            </div>
            <div class="col-4 inside-padd-one-call">
              <div class="one-call">{$ch['street']}</div>
            </div>
            <div class="col-4 inside-padd-one-call">
              <div class="one-call">{$ch['mark']}</div>
            </div>
          </div>

        end;

        //sprawdza czy już jest godzina rozpoczęcia pobierając czas z serwera

        $_SESSION['started']="";

        // Pobierz aktualną godzinę i minutę z serwera
        $current_hour = date("H");
        $current_minute = date("i");

        // Sprawdź, czy aktualna godzina i minuta mieszczą się w zakresie od 8:45 do 10:00
        //if (($current_hour == 8 && $current_minute >= 45) || ($current_hour == 9 && $current_minute <= 59) || ($current_hour == 10 && $current_minute == 0)) {
        
        if(true){
          if($_SESSION['started']=="working"||$_SESSION['started']=="support"){
            echo "Nic nie robie";
          }else if($_SESSION['started']=="started"){
            echo "Nie zmieniam bo ktoś już liczy!";
          }else{
            $_SESSION['started']="canStart";
            echo "Zmiana";
          }
          
        } else {
            if($_SESSION['started']=="canStart"){
              unset($_SESSION['started']); //jezeli ktos nie zdążył rozpocząć pracy zablokuj mu tą możliwość
            }else{

            }

            echo "<button disabled>Dostępne od: 8:45</button>";
        }


      }else{
        echo "Jeszcze nie zostało do ciebie przypisane żadne stanowisko. W razie pytań dzwoń pod jeden z numerów: <br/>";
        echo "Twórca: Marek Śnigurowicz - tel. 669 365 738<br/>";
        exit();
      }

    }else{
      echo "Nie udało wykonac się zapytania";
      exit();
    }

  }else{
    //header('Location: index.php');
    exit();
  }