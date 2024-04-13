<?php

  echo $_POST['place'];
  echo $_POST['selWorker']; //teraz warunki i dodawanie do bazy, ewentualnie wywalenie błedu
                            //po pozytywnej operacji wyczysc wszytko do zera nie liczac wyboru miasta

  if(session_status()==PHP_SESSION_ACTIVE){

  }else{
    session_start();
  }

  if(isset($_POST['place'])&&isset($_POST['selWorker'])&&is_numeric($_POST['place'])&&is_numeric($_POST['selWorker'])){

    $place=$_POST['place'];
    $worker=$_POST['selWorker'];

    require_once '../../database.php';

    $check=$db->prepare('SELECT id FROM planed WHERE id_user=:idUser');

    $check->bindValue(':idUser', $worker, PDO::PARAM_INT);

    if($check->execute()){

      if($check->rowCount()>0){ //Jeżeli ten uzytkownik był przypisany już do stanowiska

        echo "Użytkownik zmieni stanowisko";
        
        $delete=$db->prepare('DELETE FROM planed WHERE planed.id_user=:idUser');
        $delete->bindValue(':idUser', $worker, PDO::PARAM_INT);

        if($delete->execute()){

          if($delete->rowCount()>0){

            if(addPlane($db, $worker, $place)){

            }else{
              echo "Nie udało się dodać planu!";
              exit();
            }

          }else{
            echo "Nie wykonano operacji!";
          }

        }else{
          echo "Nie udało się usunąć uplanu!";
          exit();
        }

      }else{

        if(addPlane($db, $worker, $place)){

        }else{
          echo "Nie udało się dodać planuuu!";
          exit();
        }

      }

    }else{
      echo "Nie udało się wykonac zadania!";
      exit();
    }

  }else{
    echo "Nie udało się wykonac zadania!";
    exit();
  }

  function addPlane($db, $worker, $place){
    $addData=$db->prepare('INSERT INTO `planed` (`id`, `id_place`, `id_user`, `status`) VALUES (NULL, :idPlace, :idUser, "closed");');
    $addData->bindValue(':idUser', $worker, PDO::PARAM_INT);
    $addData->bindValue(':idPlace', $place, PDO::PARAM_INT);

    if($addData->execute()){

      if($addData->rowCount()>0){

        echo "Udało się przydzielić prace!";
        return true;

      }else{
        echo "Nie udało sie przydzielić stanowiska!";
        return false;
      }

    }else{
      echo "Nie udało się wykonac zadania!";
      return false;
    }
  }