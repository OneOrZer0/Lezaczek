<?php

  //echo $_POST['place'];
  //echo $_POST['selWorker']; //teraz warunki i dodawanie do bazy, ewentualnie wywalenie błedu
                            //po pozytywnej operacji wyczysc wszytko do zera nie liczac wyboru miasta

  if(session_status()==PHP_SESSION_ACTIVE){

  }else{
    session_start();
  }

  if(isset($_POST['selval'])&&!empty($_POST['selval'])&&is_numeric($_POST['selval'])){

    require_once '../../database.php';

    echo "Numer uzytkownika to: ".$_POST['selval'];

    $idUser=$_POST['selval'];

    $del=$db->prepare('DELETE FROM planed WHERE planed.id_user=:idUser');
    $del->bindValue(':idUser', $idUser, PDO::PARAM_INT);
    
    if($del->execute()){

        echo '<span style="color: green;">Użytkownik został usunięty</span>';

    }else{
      echo<<<end

        <div class="row noMarg">
          <div class="col-12 noPadd">
            <div class="errorPlane">
              Nie udało się wykonać zapytania!
            </div>
          </div>
        </div>

      end;
      exit();
    }

  }else if(isset($_POST['place'])&&isset($_POST['selWorker'])&&is_numeric($_POST['place'])&&is_numeric($_POST['selWorker'])){

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
              echo<<<end

                <div class="row noMarg">
                  <div class="col-12 noPadd">
                    <div class="errorPlane">
                      Nie udało się dodać planu!
                    </div>
                  </div>
                </div>

              end;
              exit();
            }

          }else{
            echo<<<end

              <div class="row noMarg">
                <div class="col-12 noPadd">
                  <div class="errorPlane">
                    Nie udało się wykonać operacji!
                  </div>
                </div>
              </div>

            end;
          }

        }else{
          echo<<<end

            <div class="row noMarg">
              <div class="col-12 noPadd">
                <div class="errorPlane">
                  Nie udało się usunąć planu!
                </div>
              </div>
            </div>

          end;
          exit();
        }

      }else{

        if(addPlane($db, $worker, $place)){

        }else{
          echo<<<end

            <div class="row noMarg">
              <div class="col-12 noPadd">
                <div class="errorPlane">
                  Nie udało się dodać planu
                </div>
              </div>
            </div>

          end;
          exit();
        }

      }

    }else{
      echo<<<end

          <div class="row noMarg">
            <div class="col-12 noPadd">
              <div class="errorPlane">
                Nie udało się wykonać zadania!
              </div>
            </div>
          </div>

      end;
      exit();
    }

  }else{
    echo<<<end

          <div class="row noMarg">
            <div class="col-12 noPadd">
              <div class="errorPlane">
                Nie udało się wykonać zadania!
              </div>
            </div>
          </div>

    end;
    exit();
  }

  function addPlane($db, $worker, $place){
    $addData=$db->prepare('INSERT INTO `planed` (`id`, `id_place`, `id_user`, `status`) VALUES (NULL, :idPlace, :idUser, "closed");');
    $addData->bindValue(':idUser', $worker, PDO::PARAM_INT);
    $addData->bindValue(':idPlace', $place, PDO::PARAM_INT);

    if($addData->execute()){

      if($addData->rowCount()>0){

        echo<<<end

          <div class="row noMarg">
            <div class="col-12 noPadd">
              <div class="errorPlane">
                Udało się przydzielić prace!
              </div>
            </div>
          </div>

        end;
        return true;

      }else{
        echo<<<end

          <div class="row noMarg">
            <div class="col-12 noPadd">
              <div class="errorPlane">
                Nie udało się przydzielić stanowiska!
              </div>
            </div>
          </div>

        end;
        return false;
      }

    }else{
      echo<<<end

          <div class="row noMarg">
            <div class="col-12 noPadd">
              <div class="errorPlane">
                Nie udało się wykonać zadania!
              </div>
            </div>
          </div>

        end;
      return false;
    }
  }