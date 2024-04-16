<?php

  if(session_status()==PHP_SESSION_ACTIVE){

  }else{
    session_start();
  }

  if(isset($_SESSION['logged'])&&$_SESSION['logged']['access']==1&&isset($_SESSION['idPlace'])&&$_SESSION['started']=="working"){

    echo "Udało się, możesz zacząć wypożycząć!";

    if(file_exists('./database.php')){
      require_once './database.php';
    }else{
      require_once '../database.php';
    }

    $load=$db->prepare('SELECT * FROM notepad WHERE id_place=:idPlace');
    $load->bindValue(':idPlace', $_SESSION['idPlace'], PDO::PARAM_INT);

    if($load->execute()){

      if($load->rowCount()>0){

        $lo=$load->fetch();

      }else{
        echo "Nie udało się pobrać zawartości!";
        exit();
      }

    }else{
      echo "Nie wykonano zapytania";
      exit();
    }

  }else{
    //header('Location: index.php');
    exit();
  }

?>

<div id="workerDisplay">
  <div class="row noMarg">
    <div class="col-10 offset-1 noPadd">
      <div class="">
        <div class="row noMarg">

          <div class="col-12 noPadd">
            <div class="">
              <div class="row noMarg">
                <div class="col-12">
                  Leżaki
                </div>
                <div class="col-12 noPadd">
                  <div class="">
                    <div class="row noMarg">
                      <div class="col-6 col-md-3 noPadd">
                        <div class="">
                          Stanowisko
                        </div>
                        <div class="">
                          <?php

                            echo $lo['state_sun'];

                          ?>
                        </div>
                      </div>

                      <div class="col-6 col-md-3 noPadd">
                        <div class="">
                          Na plaży
                        </div>
                        <div class="">
                          <?php

                            echo $lo['sunbed']-$lo['sun_diner'];

                          ?>
                        </div>
                      </div>

                      <div class="col-6 col-md-3 noPadd">
                        <div class="">
                          Na obiedzie
                        </div>
                        <div class="">
                          <?php

                            echo $lo['sun_diner'];

                          ?>
                        </div>
                      </div>
                      
                      <div class="col-6 col-md-3 noPadd">
                        <div class="">
                          Zostało
                        </div>
                        <div class="">
                          <?php

                            echo ($lo['state_sun']-$lo['sunbed'])+$lo['sun_diner'];

                          ?>
                        </div>
                      </div>

                      <div class="col-12 col-md-8 offset-md-2 noPadd">
                        <div class="row noMarg">
                          <div class="col-6 col-md-3 noPadd">
                            <button class="workButt" data-idbutt="sun_SP" type="button">+ Wypozyczenie</button>
                          </div>
                          <div class="col-6 col-md-3 noPadd">
                            <button class="workButt" data-idbutt="sun_DM" type="button">- Obiad</button>
                          </div>
                          <div class="col-6 col-md-3 noPadd">
                            <button class="workButt" data-idbutt="sun_DP" type="button">+ Obiad</button>
                          </div>
                          <div class="col-6 col-md-3 noPadd">
                            <button class="workButt" data-idbutt="sun_SM" type="button">- Wypozyczenie</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>  
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 noPadd">
            <div class="">
              <div class="row noMarg">
                <div class="col-12">
                  Parasole
                </div>
                <div class="col-12 noPadd">
                  <div class="">
                    <div class="row noMarg">
                      <div class="col-6 col-md-3 noPadd">
                        <div class="">
                          Stanowisko
                        </div>
                        <div class="">
                          <?php

                          echo $lo['state_umb'];

                          ?>
                        </div>
                      </div>

                      <div class="col-6 col-md-3 noPadd">
                        <div class="">
                          Wypozyczone
                        </div>
                        <div class="">
                          <?php

                            echo $lo['umbrella'];

                          ?>
                        </div>
                      </div>

                      <div class="col-6 col-md-3 noPadd">
                        <div class="">
                          Na obiedzie
                        </div>
                        <div class="">
                          <?php

                          echo $lo['umb_diner'];

                          ?>
                        </div>
                      </div>
                      
                      <div class="col-6 col-md-3 noPadd">
                        <div class="">
                          Stanowisko z obiadem
                        </div>
                        <div class="">
                          <?php

                          echo $lo['state_umb']-($lo['umbrella']+$lo['umb_diner']);

                          ?>
                        </div>
                      </div>

                      <div class="col-12 col-md-8 offset-md-2 noPadd">
                        <div class="row noMarg">
                          <div class="col-6 col-md-3 noPadd">
                            <button class="workButt" data-idbutt="umb_UP" type="button">+ Wypozyczenie</button>
                          </div>
                          <div class="col-6 col-md-3 noPadd">
                            <button class="workButt" data-idbutt="umb_DM" type="button">- Obiad</button>
                          </div>
                          <div class="col-6 col-md-3 noPadd">
                            <button class="workButt" data-idbutt="umb_DP" type="button">+ Obiad</button>
                          </div>
                          <div class="col-6 col-md-3 noPadd">
                            <button class="workButt" data-idbutt="umb_UM" type="button">- Wypozyczenie</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>  
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 noPadd">
            <div class="">
              <div class="row noMarg">
                <div class="col-12">
                  Parawany
                </div>
                <div class="col-12 noPadd">
                  <div class="">
                    <div class="row noMarg">
                      <div class="col-6 col-md-3 noPadd">
                        <div class="">
                          Stanowisko
                        </div>
                        <div class="">
                          <?php

                            echo $lo['state_scr'];

                          ?>
                        </div>
                      </div>

                      <div class="col-6 col-md-3 noPadd">
                        <div class="">
                          Wypozyczone
                        </div>
                        <div class="">
                          <?php

                            echo $lo['screen'];

                          ?>
                        </div>
                      </div>

                      <div class="col-6 col-md-3 noPadd">
                        <div class="">
                          Na obiedzie
                        </div>
                        <div class="">
                          <?php

                            echo $lo['scr_diner'];

                          ?>
                        </div>
                      </div>
                      
                      <div class="col-6 col-md-3 noPadd">
                        <div class="">
                          Stanowisko z obiadem
                        </div>
                        <div class="">
                          <?php

                            echo $lo['state_scr']-($lo['screen']+$lo['scr_diner']);

                          ?>
                        </div>
                      </div>

                      <div class="col-12 col-md-8 offset-md-2 noPadd">
                        <div class="row noMarg">
                          <div class="col-6 col-md-3 noPadd">
                            <button class="workButt" data-idbutt="scr_SP" type="button">+ Wypozyczenie</button>
                          </div>
                          <div class="col-6 col-md-3 noPadd">
                            <button class="workButt" data-idbutt="scr_DM" type="button">- Obiad</button>
                          </div>
                          <div class="col-6 col-md-3 noPadd">
                            <button class="workButt" data-idbutt="scr_DP" type="button">+ Obiad</button>
                          </div>
                          <div class="col-6 col-md-3 noPadd">
                            <button class="workButt" data-idbutt="scr_SM" type="button">- Wypozyczenie</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>  
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    $(".workButt").click(function(){

      var idButt = $(this).data('idbutt');

        $.ajax({
            url: './work/changeValuePoint.php',
            type: 'POST',
            data: { idButt: idButt }, // Jeśli chcesz przekazać dane do skryptu PHP
            success: function(response) {
                // Aktualizacja zawartości diva
                $("#workerDisplay").html(response);
            },
            error: function(xhr, status, error) {
                // Obsługa błędów
                $("#workerDisplay").html("Nie działa");
                console.error(xhr.responseText);
            }
        });
    });
  });
</script>