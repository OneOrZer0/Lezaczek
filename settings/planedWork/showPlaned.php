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

        }

        
        
        if($listAll->rowCount()>0){

          $listA=$listAll->fetchAll();

          echo<<<end

            <div class="row noMarg">
              <div class="col-12 noPadd">
                <div class="tableCellA">
                  <div class="row noMarg">
                    <div class="col-md-2 opA noPadd">
                      Miejscowość
                    </div>
                    <div class="col-md-2 opB noPadd">
                      Ulica
                    </div>
                    <div class="col-md-2 opA noPadd">
                      Leżaki
                    </div>
                    <div class="col-md-2 opB noPadd">
                      Parasole
                    </div>
                    <div class="col-md-2 opA noPadd">
                      Parawany
                    </div>
                    <div class="col-md-1 opB noPadd">
                      Status
                    </div>
                    <div class="col-md-1 opA noPadd">
                      Wybór
                    </div>
                  </div>
                </div>
              </div>
          end;


          echo<<<end

            <div class="col-12 noPadd tableCellB marg">
              <div class="row noMarg">

          end;

              foreach($listA as $li){ //Niech sprawdza czy nie jest już ktoś przypisany

                echo<<<end

                  <div class="col-12 noPadd">
                    <div class="">
                      <div class="row noMarg">
                        <div class="col-md-2 opA noPadd">
                          {$li['city']}
                        </div>
                        <div class="col-md-2 opB noPadd">
                          {$li['street']}
                        </div>
                        <div class="col-md-2 opA noPadd">
                          {$li['sunbeds']}
                        </div>
                        <div class="col-md-2 opB noPadd">
                          {$li['umbrellas']}
                        </div>
                        <div class="col-md-2 opA noPadd">
                          {$li['screens']}
                        </div>
                        <div class="col-md-1 opB noPadd">
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
                        <div class="col-md-1 opC noPadd">
                          <input type="radio" value="{$li['id']}" name="place">
                        </div>
                      </div>
                    </div>
                  </div>

                end;

                echo '<div class="col-12 noPadd">';

                if(isset($who)){

                  echo<<<end

                  <div class="">
                    <div class="row noMarg">
                      <div class="col-12 noPadd">
                        <div class="titleRowBox">
                          <div class="titleRow">
                            <div class="row noMarg">
                              <div class="col-2 noPadd">
                                Imie
                              </div>
                              <div class="col-3 noPadd">
                                Nazwisko
                              </div>
                              <div class="col-2 noPadd">
                                Telefon
                              </div>
                              <div class="col-3 noPadd">
                                E-Mail
                              </div>
                              <div class="col-2 noPadd">
                                Akcja
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 tableBoxPadd">
                        <div class="tableBox">
                          <div class="row noMarg">

                  end;

                  foreach($who as $w){

                    echo<<<end
                  
                          <div class="col-12 noPadd">
                            <div class="tableCellD">
                              <div class="row noMarg">
                                <div class="col-2 opA">
                                  {$w['name']}
                                </div>
                                <div class="col-3 opB">
                                  {$w['surname']}
                                </div>
                                <div class="col-2 opA">
                                  {$w['tel']}
                                </div>
                                <div class="col-3 opB">
                                  {$w['email']}
                                </div>
                                <div class="col-2 opC">
                                  <button class="delButt" data-valbut="{$w['id']}" type="button">Usuń</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        
                    end;

                  }

                  echo<<<end
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  end;

                  unset($who);

                }else{
                  //echo "To nie istnieje!";
                }

                echo '</div>';

              }

          echo<<<end
                <div class="col-12 noPadd">
                  <div class="row noMarg">
                    <div class="col-6 opD noPadd">
                      <span style="color: red;">
                        !
                      </span>
                      - Do stanowiska nie jest nikt przypisany!
                    </div>
                    <div class="col-6 opD noPadd">
                      <span style="color: green;">
                        $
                      </span>
                      - Do stanowiska jest już ktoś przypisany!
                    </div>
                  </div>
                </div>
              </div>
            </div>

          end;


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