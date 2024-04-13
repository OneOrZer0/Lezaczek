<?php

  if(session_status()==PHP_SESSION_ACTIVE){
    
  }else{
    session_start();
  }

  if(isset($_SESSION['logged'])&&$_SESSION['logged']['access']==7){ //Tylko administrator może ustalać gdzie kto ma pracować

    require_once '../database.php';

  }else{
    header('Location: index.php');
    exit();
  }

?>

<div class="row noMarg">
  <div class="">
    <div class="col-8 offset-2 noPadd">
      <div class="">
        <div class="row noMarg">
          <div class="col-12 noPadd">
            <form id="showList">
              <select name="nameCity">
                <?php
                  $list=$db->query('SELECT * FROM citys');

                  if($list->rowCount()>0){

                    echo '<option value="a">Wszytkie miejscowości</option>';
                    
                    $citys=$list->fetchAll();

                    foreach($citys as $ci){
                      echo '<option value="'.$ci['id'].'">'.$ci['city'].'</script>';
                    }

                  }else{

                    echo '<option value="0">Nie znaleziono miejscowości</option>';

                  }
                ?>
              </select>
              <button>Wyświetl</button>
            </form>
          </div>
          <div class="col-12 noPadd">
            <form id="itsGood">
              <div id="displayList">
                Tutaj wyświetlą się dostępne stanowiska
              </div>

              <div class="">
                <div class="row noMarg">

                  <div class="col-12 noPadd">
                    <div class="row noMarg">
                      <div class="col-3 noPadd selType" data-sel="low">
                        <span style="color: red;">Nieprzydzielony</span>
                      </div>

                      <div class="col-3 noPadd selType" data-sel="medium">
                        <span style="color: orange;">Zawieszony</span>
                      </div>

                      <div class="col-3 noPadd selType" data-sel="high">
                        <span style="color: green;">Przydzielony</span>
                      </div>

                      <div class="col-3 noPadd selType" data-sel="all">
                        <span style="color: black;">Wszystkie</span>
                      </div>
                    </div>
                  </div>

                  <div class="col-12 noPadd">
                    <div class="">
                      <div class="row noMarg">
                        <div class="col-2 noPadd">
                          Imie
                        </div>

                        <div class="col-2 noPadd">
                          Nazwisko
                        </div>  

                        <div class="col-2 noPadd">
                          Telefon
                        </div>  

                        <div class="col-2 noPadd">
                          E-Mail
                        </div>

                        <div class="col-2 noPadd">
                          Status
                        </div>

                        <div class="col-2 noPadd">
                          Wybór
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-12 noPadd">
                    <div id="showUser">
                      <div class="row noMarg">

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <div id="infoBox">
              Tutaj pojawią się błedy!
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
      $('.selType').click(function(){

        var dane = $(this).data('sel');

        $.ajax({
          url: './settings/planedWork/showSelUser.php',
          type: 'POST',
          data: {dane: dane},
          success: function(response) {
            $('#showUser').html(response);
          },
          error: function(xhr, status, error){
            $('#showUser').html('Nie działa');
            console.error(xhr.responseText);
          }
        });
      });

      $("#showList").submit(function(event){
          // Zapobiegamy domyślnej akcji formularza (przeładowaniu strony)
          event.preventDefault();
          
          // Pobieramy dane z formularza
          var formData = $(this).serialize();
          
          // Wysyłamy żądanie AJAX
          $.ajax({
              url: './settings/planedWork/showPlaned.php', // Adres URL pliku PHP, do którego wysyłamy żądanie
              type: 'POST', // Metoda żądania
              data: formData, // Dane do przesłania
              success: function(response) {
                  // Obsługa sukcesu, np. wyświetlenie odpowiedzi z serwera
                  $('#displayList').html(response);
              },
              error: function(xhr, status, error) {
                $('#displayList').html('Nie działa');
                  console.error(xhr.responseText);
              }
          });
      });

      $("#itsGood").submit(function(event){
          // Zapobiegamy domyślnej akcji formularza (przeładowaniu strony)
          event.preventDefault();
          
          // Pobieramy dane z formularza
          var formData = $(this).serialize();
          
          // Wysyłamy żądanie AJAX
          $.ajax({
              url: './settings/planedWork/makePlane.php', // Adres URL pliku PHP, do którego wysyłamy żądanie
              type: 'POST', // Metoda żądania
              data: formData, // Dane do przesłania
              success: function(response) {
                  // Obsługa sukcesu, np. wyświetlenie odpowiedzi z serwera
                  $('#infoBox').html(response);
              },
              error: function(xhr, status, error) {
                $('#infoBox').html('Nie działa');
                  console.error(xhr.responseText);
              }
          });
      });
  });
</script>