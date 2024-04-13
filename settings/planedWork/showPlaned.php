<?php

  if(session_status()==PHP_SESSION_ACTIVE){
    
  }else{
    session_start();
  }

  if(isset($_SESSION['logged'])&&$_SESSION['logged']['access']==7){ //Tylko administrator może ustalać gdzie kto ma pracować

    require_once '../../database.php';

    if(isset($_POST['nameCity'])&&!empty($_POST['nameCity'])){

      require_once '../../database.php';

      $dane=$_POST['nameCity'];

      if($dane==0){

        echo "Jeżeli nie ma miast nie ma też stanowisk!";
        exit();

      }else if($dane=='a'||$dane>0){

        if($dane=='a'){

          $listAll=$db->query('SELECT citys.city, places.* FROM places, citys WHERE places.id_city=citys.id');

        }else if($dane>0){

          $listAll=$db->prepare('SELECT citys.city, places.* FROM places, citys WHERE places.id_city=:idCity AND citys.id=:idCityA');

          $listAll->bindValue(':idCity', $dane, PDO::PARAM_INT);
          $listAll->bindValue(':idCityA', $dane, PDO::PARAM_INT);

          if($listAll->execute()){
            

          }else{
            echo "Nie udało się wykonac zapytania!";
            exit();
          }

        }

        
        
        if($listAll->rowCount()>0){

          $listA=$listAll->fetchAll();

          echo<<<end

            <div class="row noMarg">
              <div class="col-12 noPadd">
                <div class="">
                  <div class="row noMarg">
                    <div class="col-md-2">
                      Miejscowość
                    </div>
                    <div class="col-md-2">
                      Ulica
                    </div>
                    <div class="col-md-2">
                      Leżaki
                    </div>
                    <div class="col-md-2">
                      Parasole
                    </div>
                    <div class="col-md-2">
                      Parawany
                    </div>
                    <div class="col-md-1">
                      Status
                    </div>
                    <div class="col-md-1">
                      Wybór
                    </div>
                  </div>
                </div>
              </div>
          end;

          foreach($listA as $li){ //Niech sprawdza czy nie jest już ktoś przypisany

            echo<<<end

              <div class="col-12 noPadd">
                <div class="">
                  <div class="row noMarg">
                    <div class="col-md-2 noPadd">
                      {$li['city']}
                    </div>
                    <div class="col-md-2 noPadd">
                      {$li['street']}
                    </div>
                    <div class="col-md-2 noPadd">
                      {$li['sunbeds']}
                    </div>
                    <div class="col-md-2 noPadd">
                      {$li['umbrellas']}
                    </div>
                    <div class="col-md-2 noPadd">
                      {$li['screens']}
                    </div>
                    <div class="col-md-1 noPadd">
            end;

                    $planed=$db->prepare('SELECT users.id, users.name, users.surname, users.email, users.tel FROM planed, users WHERE planed.id_place=:idPlace AND users.id=planed.id_user');
                    $planed->bindValue(':idPlace', $li['id'], PDO::PARAM_INT);

                    if($planed->execute()){

                      if($planed->rowCount()>0){

                        $who=$planed->fetchAll();
                        echo '<span style="color: green;">$</span>';

                      }else{

                        echo '<span style="color: red;">!</span>';

                      }

                    }else{

                      echo '<span style="color: orange;">?</span>';

                    }

            echo<<<end
                    </div>
                    <div class="col-md-1 noPadd">
                      <input type="radio" value="{$li['id']}" name="place">
                    </div>
                  </div>
                </div>
              </div>

            end;

            echo '<div class="col-12 noPadd">';

            if(isset($who)){

              foreach($who as $w){

                echo<<<end
              
                  <div class="">
                    <div class="row noMarg">
                      <div class="col-2">
                        {$w['name']}
                      </div>
                      <div class="col-2">
                        {$w['surname']}
                      </div>
                      <div class="col-2">
                        {$w['tel']}
                      </div>
                      <div class="col-2">
                        {$w['email']}
                      </div>
                      <div class="col-2">
                        <button class="delButt" value="{$w['id']}" type="button">Usuń</button>
                      </div>
                    </div>
                  </div>
              
                end;

              }

              unset($who);

            }else{
              //echo "To nie istnieje!";
            }

            echo '</div>';

          }

          //SPRAWDZA CZY JUŻ KTOŚ JEST PRZYPISANY DO STANOWISKA



          echo<<<end
            </div>

          end;

        }else{
          echo "<span style=\"color: orange;\">Nie znaleziono tutaj żadnych stanowisk</span>";
          exit();
        }

      }else if($dane>0){

      }else{
        echo "Wykryto nieodpowiednie wartości!";
        exit();
      }

    }else{
      echo "Nie odpowiednie dane!";
      exit();
    }

  }else{
    header('Location: index.php');
    exit();
  }

?>