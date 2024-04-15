<?php

  if(session_status()==PHP_SESSION_ACTIVE){

  }else{
    session_start();
  }

  if($_SESSION['logged']['access']==1&&isset($_SESSION['started'])&&$_SESSION['started']=="started"){

    //Pobiera ilośc sprzętu jaka powinna być na stanowisku

    //places.sunbeds, places.umbrellas, places.screens, places.no_sunbeds

    $getData=$db->prepare('SELECT places.sunbeds, places.umbrellas, places.screens, places.no_sunbeds, places.no_umbrellas, places.no_screens FROM places, planed WHERE places.id=planed.id_place AND planed.id_user=:idUser');
    $getData->bindValue(':idUser', $_SESSION['logged']['id'], PDO::PARAM_INT);
    
    if($getData->execute()){

      if($getData->rowCount()>0){

        $getD=$getData->fetch();

        echo "<h1>Przed rozpoczęciem podaj stan sprzętu plażowego!</h1>";
    
        echo<<<end
    
          <div class="row noMarg">
            <div class="">
              <div class="col-8 offset-2 noPadd">
                <div class="row noMarg">
                  <div class="col-12 noPadd">
                    <div class="row noMarg">
                      <div class="col-12 noPadd">
        end;

                        if(isset($_SESSION['errSun'])){
                          echo $_SESSION['errSun'];
                          unset($_SESSION['errSun']);
                        }else{
                          
                        }

        echo<<<end
                      </div>
                      <div class="col-6 noPadd">
                        <input type="text" name="sunbeds" placeholder="Stan leżaków">
                      </div>
                      <div class="col-2 noPadd">
                        /
                      </div>
                      <div class="col-4 noPadd">
        end;

                        $ileSun=$getD['sunbeds']-$getD['no_sunbeds'];

                        if($ileSun<0){

                          echo "0";

                        }else{

                          echo $ileSun;

                        }

        echo<<<end
                      </div>
                    </div>
                  </div>
    
                  <div class="col-12 noPadd">
                    <div class="row noMarg">
        end;

                        if(isset($_SESSION['errUmb'])){
                          echo $_SESSION['errUmb'];
                          unset($_SESSION['errUmb']);
                        }else{
                          
                        }

        echo<<<end
                      <div class="col-6 noPadd">
                        <input type="text" name="umbrellas" placeholder="Stan parasoli">
                      </div>
                      <div class="col-2 noPadd">
                        /
                      </div>
                      <div class="col-4 noPadd">
        end;

                        $ileUmb=$getD['umbrellas']-$getD['no_umbrellas'];

                        if($ileUmb<0){

                          echo "0";

                        }else{

                          echo $ileUmb;

                        }

        echo<<<end
                      </div>
                    </div>
                  </div>
    
                  <div class="col-12 noPadd">
                    <div class="row noMarg">
        end;

                        if(isset($_SESSION['errScr'])){
                          echo $_SESSION['errScr'];
                          unset($_SESSION['errScr']);
                        }else{
                          
                        }

        echo<<<end
                      <div class="col-6 noPadd">
                        <input type="text" name="screens" placeholder="Stan parawanów">
                      </div>
                      <div class="col-2 noPadd">
                        /
                      </div>
                      <div class="col-4 noPadd">
        end;

                        $ileScr=$getD['screens']-$getD['no_screens'];

                        if($ileScr<0){

                          echo "0";

                        }else{

                          echo $ileScr;

                        }

        echo<<<end
                      </div>
                    </div>
                  </div>
                  <div class="col-6 noPadd">
                    <button id="applyFirst">Potwierdź stan sprzętu</button>
                  </div>
                  <div id="finishButton" class="col-6 noPadd">
                    Tutaj pojawi się przycisk ostateczny
                  </div>
                </div>
              </div>
            </div>
          </div>
    
        end;

        if(!isset($_SESSION['statusSunPoint'])){
          $_SESSION['statusSunPoint'] = ['sunbeds'=> $getD['sunbeds'], 'umbrellas'=> $getD['umbrellas'], 'screens'=> $getD['screens'], 'no_sunbeds'=> $getD['no_sunbeds'], 'no_umbrellas'=> $getD['no_umbrellas'], 'no_screens'=> $getD['no_screens']];
        }else{

        }
        
      }else{

        echo "Nie znaleziono danych stanowiska!";

      }

    }else{

    }

  }else{
    header('Location: index.php');
    exit();
  }