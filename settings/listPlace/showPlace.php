<?php
  if(session_status()==PHP_SESSION_ACTIVE){

  }else{
    session_start();
  }

  if(isset($_SESSION['logged'])&&$_SESSION['logged']['access']>=4){

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
                      Pinezka
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
                  </div>
                </div>
              </div>
          end;

          foreach($listA as $li){

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
                      {$li['mark']}
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
                  </div>
                </div>
              </div>

            end;

          }

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
    header('index.php');
    exit();
  }
?>