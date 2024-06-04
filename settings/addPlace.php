<?php

  if(session_status()==PHP_SESSION_ACTIVE){

  }else{
    session_start();
  }

  require_once '../database.php';

?>

<div class="row noMarg">
  <div class="col-12 noPadd">
    <div class="styleListButton">
      <form id="addCityPlace">
        <div class="">
          <div class="row noMarg">
            <div class="col-10 offset-1 noPadd">
              <div class="">
                <div class="row noMarg">
                  <div class="col-12 noPadd">
                    <div>
                      Wybierz miejscowość
                    </div>
                  </div>
                  <div class="col-12 inOnePadd">
                    <div id="selectCity">
                      <select name="selCity"> <!-- Wartosc miejscowosci bedzie w zmiennej sesyjnej -->
                        <option value="0">Wybierz miejscowość</option>
                        <option value="n">Ustaw nową</option>
                        <?php

                          $loadCity=$db->query('SELECT * FROM citys');

                          if($loadCity->rowCount()>0){

                            $loadC=$loadCity->fetchAll();

                            foreach($loadC as $lc){
                              echo '<option value='.$lc['id'].'>'.$lc['city'].'</option>';
                            }

                          }else{

                          }

                        ?>
                      </select>
                      <button>Wybierz</button>
                      <button id="refresh" type="button">Odświerz miejscowości</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      <form id="createPlace">
        <div id="showInputs">

        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
      $("#addCityPlace").submit(function(event){
          // Zapobiegamy domyślnej akcji formularza (przeładowaniu strony)
          event.preventDefault();
          
          // Pobieramy dane z formularza
          var formData = $(this).serialize();
          
          // Wysyłamy żądanie AJAX
          $.ajax({
              url: './settings/addPlace/city.php', // Adres URL pliku PHP, do którego wysyłamy żądanie
              type: 'POST', // Metoda żądania
              data: formData, // Dane do przesłania
              success: function(response) {
                  // Obsługa sukcesu, np. wyświetlenie odpowiedzi z serwera
                  $('#showInputs').html(response);
              },
              error: function(xhr, status, error) {
                $('#showInputs').html('Nie działa');
                  console.error(xhr.responseText);
              }
          });
      });
  });

  $(document).ready(function(){
      $("#createPlace").submit(function(event){
          // Zapobiegamy domyślnej akcji formularza (przeładowaniu strony)
          event.preventDefault();
          
          // Pobieramy dane z formularza
          var formData = $(this).serialize();
          
          // Wysyłamy żądanie AJAX
          $.ajax({
              url: './settings/addPlace/addPlace.php', // Adres URL pliku PHP, do którego wysyłamy żądanie
              type: 'POST', // Metoda żądania
              data: formData, // Dane do przesłania
              success: function(response) {
                  // Obsługa sukcesu, np. wyświetlenie odpowiedzi z serwera
                  $('#showInputs').html(response);
              },
              error: function(xhr, status, error) {
                $('#showInputs').html('Nie działa');
                  console.error(xhr.responseText);
              }
          });
      });
  });

  $(document).ready(function(){
    $("#refresh").click(function(){
      
      $.ajax({
        url: './settings/addPlace/refreshCity.php',
        type: 'POST',
        success: function(response) {
            // Aktualizacja zawartości diva
            $("#selectCity").html(response);
        },
        error: function(xhr, status, error) {
            // Obsługa błędów
            console.error(xhr.responseText);
        }
      });
    });
  });
</script>