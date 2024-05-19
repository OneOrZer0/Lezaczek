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

    echo <<< end

      <div class="titlePadd">
        <div class="row noMarg">
          <div class="col-12 noPadd">
            <div class="titleListBar">
              <div class="row noMarg">
                <div class="col-2 ocA noPadd">
                  ID
                </div>
                <div class="col-3 ocA noPadd">
                  Imie
                </div>
                <div class="col-3 ocA noPadd">
                  Nazwisko
                </div>
                <div class="col-2 ocA noPadd">
                  Telefon
                </div>
                <div class="col-2 ocA noPadd">
                  Status
                </div>
              </div>
            </div>
          </div>
      

    end;

    // echo "<div>ID Imie Nazwisko Telefon Status</div>";

    require_once '../database.php';

    $load=$db->query('SELECT id, name, surname, tel, status FROM users WHERE access=1');

    if($load->rowCount()>0){
      $listUser=$load->fetchAll();

      echo<<<end

        <div class="col-12 noPadd">
          <div class="tableListA">
            <div class="row noMarg">

      end;

      foreach($listUser as $li){

        echo<<<end

          <div class="col-12 noPadd">
            <div class="tableListB">
              <div class="row noMarg">
                <div class="col-2 ocA noPadd">
                  {$li['id']}
                </div>
                <div class="col-3 ocA noPadd">
                  {$li['name']}
                </div>
                <div class="col-3 ocA noPadd">
                  {$li['surname']}
                </div>
                <div class="col-2 ocA noPadd">
                  {$li['tel']}
                </div>
                <div class="col-2 ocC noPadd">
                  {$li['status']}
                </div>
              </div>
            </div>
          </div>

        end;

        // echo $li['id'].' | '.$li['name'].' | '.$li['surname'].' | '.$li['tel'].' | '.$li['status'].'<br/>';
      }
    }else{
      echo "Nikogo nie znaleziono!";
    }

    echo<<<end
              </div>
            </div>
          </div>
        </div>
      </div>
    end;
  }