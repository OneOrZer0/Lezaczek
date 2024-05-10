<?php

  if(session_status()==PHP_SESSION_ACTIVE){

  }else{

    session_start();

  }

  if(isset($_SESSION['logged'])&&$_SESSION['logged']['access']==1){

    if(file_exists('./database.php')){
        require_once './database.php';
    }else{
        require_once '../database.php';
    }

    if(isset($_POST['endCode'])){

      if(!empty($_POST['endCode'])){

        $endCode = $_POST['endCode'];

        $loadCode=$db->prepare('SELECT id FROM avalible_code WHERE id_type_code=:idTypeCode AND code=:endCode');
        $loadCode->bindValue(':endCode', $endCode, PDO::PARAM_INT);
        $loadCode->bindValue(':idTypeCode', 1, PDO::PARAM_INT);
        if($loadCode->execute()){

          if($loadCode->rowCount()>0){

            //ROZPOCZECIE PROCEDURY KONCZENIA PRACY

            $loadData=$db->prepare('SELECT * FROM notepad WHERE id_place=:idPlace');
            $loadData->bindValue(':idPlace', $_SESSION['idPlace'], PDO::PARAM_INT);
            if($loadData->execute()){

              if($loadData->rowCount()>0){

                $loadedData=$loadData->fetch();

                $saveData=$db->prepare('INSERT INTO finished_works (id, sunbed, state_sun, sun_diner, umbrella, state_umb, umb_deposit, umb_diner, screen, state_scr, scr_deposit, scr_diner, id_place, date, id_capitan) VALUES (null, :sb, :stateSb, :sbDiner, :ub, :stateUb, :ubDeposit, :ubDiner, :sn, :stateSn, :snDeposit, :snDiner, :idPlace, :date, :idCapitan)');
                $saveData->bindValue(':sb', $loadedData['sunbed'], PDO::PARAM_INT);
                $saveData->bindValue(':stateSb', $loadedData['state_sun'], PDO::PARAM_INT);
                $saveData->bindValue(':sbDiner', $loadedData['sun_diner'], PDO::PARAM_INT);
                $saveData->bindValue(':ub', $loadedData['umbrella'], PDO::PARAM_INT);
                $saveData->bindValue(':stateUb', $loadedData['state_umb'], PDO::PARAM_INT);
                $saveData->bindValue(':ubDeposit', $loadedData['umb_deposit'], PDO::PARAM_INT);
                $saveData->bindValue(':ubDiner', $loadedData['umb_diner'], PDO::PARAM_INT);
                $saveData->bindValue(':sn', $loadedData['screen'], PDO::PARAM_INT);
                $saveData->bindValue(':stateSn', $loadedData['state_scr'], PDO::PARAM_INT);
                $saveData->bindValue(':snDeposit', $loadedData['scr_deposit'], PDO::PARAM_INT);
                $saveData->bindValue(':snDiner', $loadedData['scr_diner'], PDO::PARAM_INT);
                $saveData->bindValue(':idPlace', $loadedData['id_place'], PDO::PARAM_INT);
                $saveData->bindValue(':date', $loadedData['date'], PDO::PARAM_INT);
                $saveData->bindValue(':idCapitan', $_SESSION['logged']['id'], PDO::PARAM_INT);
                if($saveData->execute()){

                  //Udało się wykonać!
                  if($saveData->rowCount()>0){

                    //Jeżeli zostało włożone to usuwa dane z tabeli notepad tego użytkownika

                    $removeData=$db->prepare('DELETE FROM notepad WHERE id_place=:idPlace');
                    $removeData->bindValue(':idPlace', $_SESSION['idPlace'], PDO::PARAM_INT);
                    if($removeData->execute()){

                      // echo "Pomyślnie zakończono prace, możesz się wylogować";

                      //tutaj zamiescic tworzenie loga z zamknieciem stanowiska i czy było ono z kodem czy bez!

                      //ZMIANA STATUSU PRACOWNIKÓW ABY MOGLI ONI OCZEKIWAĆ NA KOLEJNY DZIEŃ PRACY

                      $updateDB=$db->prepare('UPDATE planed SET status = closed WHERE planed.id_place = :idPlace; ');
                      $updateDB->bindValue(':idPlace', $_SESSION['idPlace'], PDO::PARAM_INT);
                      if($updateDB->execute()){

                      }else{

                        echo "Wykrytom problem z zapytaniem";
                        
                      }

                    }else{

                    }

                  }else{

                  }

                }else{

                  //Nie udało się wykonac zapytania wkładającego

                }

              }else{

              }

            }else{

            }

            echo "good_code_1";

            // $finish=$db->prepare('INSERT INTO ');

          }else{

            echo "bad_code_1";

          }

        }else{

          echo "Nie działa";

        }

      }else{

        echo "Nie wprowadzono żadnego kodu!";
        // exit();

      }

    }else{

      echo "Cos 1";

    }

  }else{

    echo "Cos 2";

  }