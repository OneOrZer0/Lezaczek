<?php

  if(session_status()==PHP_SESSION_ACTIVE){

  }else{
    session_start();
  }

  if(!isset($_SESSION['logged'])){
    header('Location: index.php');
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
    
  </head>
  <body>
    <div class=".container">
      
      <?php
        require_once 'navBar.php';
      ?>

      <div id="displayBox">
        <div class="row noMarg">
          <div class="col-8 offset-2 noPadd">
            <div class="first-login">
              <div class="row noMarg">
                <div class="col-12 noPadd">
                  <h1>PRZYDZIELONO</h1>
                </div>
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
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>