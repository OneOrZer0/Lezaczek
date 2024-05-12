<?php

  if(session_status()==PHP_SESSION_ACTIVE){

  }else{
    session_start();
  }

  if(!isset($_SESSION['logged'])){
    //header('Location: index.php');
    exit();
  }else{

  }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SunApp</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/workerSpace.css">border: 2px solid greenyellow;
  </head>
  <body>
    <div class=".container">
      
      <?php
        //sprawdza warunek czy user jest pracownikiem, po czym kaze mu wpisac stan stanowiska aby mógł już dodawać sprzęt

          require_once 'navBar.php'; //nawigacja zostanie załadowana dopiero gdy wprowadzone zostaną dane
        
      ?>

      <div id="displayBox">
        <div class="row noMarg">
          <div class="col-8 offset-2 noPadd">
            <div class="row noMarg">
              <div class="col-12 noPadd">
                <div class="first-login">
                  <form id="startWork">
                    <div id="startedWork">
                      <?php

                        if($_SESSION['logged']['access']==1){

                          //echo "Zmienna: ".$_SESSION['started'];

                          //Pokazuje na jakie stanowisko ma się udać pracownik
                          if(isset($_SESSION['started'])){
                            if($_SESSION['started']=="working"||$_SESSION['started']=="support"){
                              //require_once './work/showHasWork.php';
                            }else{
                              require_once './work/showHasWork.php';
                            }
                          }else{
                            require_once './work/showHasWork.php';
                          }
                          
                          echo "Zmienna: ".$_SESSION['started'];

                          if(isset($_SESSION['started'])&&$_SESSION['started']=="canStart"){

                            echo "<button>Rozpocznij prace</button>";
                            //tutaj wchodzi jeżeli jest już godzina 8:45, pojawia się przycisk "ROZPOCZNIJ PRACE"

                          }else if(isset($_SESSION['started'])&&$_SESSION['started']=="started"){

                            require_once './work/checkData.php'; //Tutaj ustawia liczenie stanu

                          }else if(isset($_SESSION['started'])&&$_SESSION['started']=="working"){

                            echo "Wszystko policzone, możesz zacząć zarabiać pitos!";

                            require_once './work/masterPoint.php'; //Całkowicie osobny plik z osobnymi skryptami

                          }else if(isset($_SESSION['started'])&&$_SESSION['started']=="support"){
                            
                            echo "Wszytko policzone, jesteś supportem";

                            require_once './work/supportPoint.php';

                          }else{

                          }
                          //sprawdzić czy już pracownik nie wprowadził stanu
                          
                          //niech pokaze się które stanowisko ma obsluzyć

                          //rozpoczac moze dopiero o godzinie 9:00

                          //require_once './work/firstStep.php'; //Wprowadź stan sprzętu plażowego do bazy

                        }else{
                          
                        }

                      ?>
                    </div>
                    <div class="col-4 offset-4 noPadd">
                      <!-- <button>Potwierdź</button> -->
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-12 noPadd">
                <form id="">
                  <div class="row noMarg">
                    <div class="col-12 noPadd">
                      Tutaj po wprowadzeniu danych
                    </div>
                    <div id="nivea">
                      Tutaj pojawi się czy sukces
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      
      $(document).ready(function(){

          $("#controlPanel").click(function(){
              $.ajax({
                  url: 'controlPanel.php',
                  type: 'POST',
                  data: { key: 'value' }, // Jeśli chcesz przekazać dane do skryptu PHP
                  success: function(response) {
                      // Aktualizacja zawartości diva
                      $("#displayBox").html(response);
                  },
                  error: function(xhr, status, error) {
                      // Obsługa błędów
                      console.error(xhr.responseText);
                  }
              });
          });

          $("#startWork").submit(function(event){
          // Zapobiegamy domyślnej akcji formularza (przeładowaniu strony)
          event.preventDefault();
          
          // Pobieramy dane z formularza
          var formData = $(this).serialize();
          
          // Wysyłamy żądanie AJAX
          $.ajax({
              url: './work/checkData.php', // Adres URL pliku PHP, do którego wysyłamy żądanie
              type: 'POST', // Metoda żądania
              data: formData, // Dane do przesłania
              success: function(response) {
                  // Obsługa sukcesu, np. wyświetlenie odpowiedzi z serwera
                  $('#startedWork').html(response);
              },
              error: function(xhr, status, error) {
                $('#startedWork').html('Nie działa');
                  console.error(xhr.responseText);
              }
          });
        });
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>