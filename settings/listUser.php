<div>Działa</div>
<?php
  if(session_status()==PHP_SESSION_ACTIVE){

  }else{
    session_start();
  }

  if(!isset($_SESSION['logged'])||$_SESSION['logged']['access']<4){
    header('Location: index.php');
    exit();
  }else{
    echo<<<end
      <div class="row noMarg">
        <div class="col-12 titlePadd">
          <div class="titleListBar">
            <div class="row noMarg">
              <div class="col-md-1 ocA noPadd">
                ID
              </div>
              <div class="col-md-1 ocB noPadd">
                Imie
              </div>
              <div class="col-md-2 ocA noPadd">
                Nazwisko
              </div>
              <div class="col-md-2 ocB noPadd">
                E-Mail
              </div>
              <div class="col-md-1 ocA noPadd">
                Telefon
              </div>
              <div class="col-md-1 ocB noPadd">
                Pesel
              </div>
              <div class="col-md-1 ocA noPadd">
                Miasto
              </div>
              <div class="col-md-1 ocB noPadd">
                Ulica
              </div>
              <div class="col-md-1 ocA noPadd">
                Nr. kwatery
              </div>
              <div class="col-md-1 ocB noPadd">
                Status
              </div>
            </div>
          </div>
        </div>
      </div>
    end;

    require_once '../database.php';

    $load=$db->query('SELECT * FROM users WHERE access=1');

    if($load->rowCount()>0){
      $listUser=$load->fetchAll();

        echo<<<end

        <div class="titlePaddA">
          <div class="tableListA">
            <div class="row noMarg">

        end;

        $otherStyle = false;

        foreach($listUser as $li){

          echo<<<end

            <div class="col-12 noPadd">
              <div class="tableListB">
                <div class="row noMarg">
                  <div class="col-md-1 ocA noPadd">
                    {$li['id']}
                  </div>
                  <div class="col-md-1 ocB oneCell noPadd">
                    {$li['name']}
                  </div>
                  <div class="col-md-2 ocA oneCell noPadd">
                    {$li['surname']}
                  </div>
                  <div class="col-md-2 ocB oneCell noPadd">
                    {$li['email']}
                  </div>
                  <div class="col-md-1 ocA oneCell noPadd">
                    {$li['tel']}
                  </div>
                  <div class="col-md-1 ocB oneCell noPadd">
                    {$li['pesel']}
                  </div>
                  <div class="col-md-1 ocA oneCell noPadd">
                    {$li['city']}
                  </div>
                  <div class="col-md-1 ocB oneCell noPadd">
                    {$li['street']}
                  </div>
                  <div class="col-md-1 ocA oneCell noPadd">
                    {$li['nr_home']}
                  </div>
                  <div class="col-md-1 ocB oneCell noPadd">
                    {$li['city']}
                  </div>
                </div>
              </div>
            </div>
        end;

        }//Koniec petli

        echo<<<end

              </div>
            </div>
          </div>

        end;

      // foreach($listUser as $li){
      //   echo $li['id'].' | '.$li['name'].' | '.$li['surname'].' | '.$li['email'].' | '.$li['tel'].' | '.$li['pesel'].' | '.$li['city'].' | '.$li['street'].' | '.$li['nr_home'].' | '.$li['status'].'<br/>';
      // }

    }else{
      echo "Nikogo nie znaleziono!";
    }
  }