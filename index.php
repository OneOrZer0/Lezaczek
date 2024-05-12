<?php

  if(session_status()==PHP_SESSION_ACTIVE){

  }else{
    session_start();
  }

  if(isset($_SESSION['logged'])){
    header('Location: workerSpace.php');
    exit();
  }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">
  </head>
  <body>
    <div class=".container">
      <div id="displayBox">
        <div class="row noMarg">
          <div class="col-10 offset-1 col-sm-8 offset-sm-2 col-md-4 offset-md-4 col-lg-2 offset-lg-5 noPadd">
            <div class="">
              <div class="login-box">
                <form action="login.php" method="post">
                  <div class="row noMarg">
                    <div class="col-12 noPadd">
                      <?php
                        if(isset($_SESSION['errLogin'])){
                          echo $_SESSION['errLogin']."<br/>";
                          unset($_SESSION['errLogin']);
                        }else{

                        }

                        if(isset($_SESSION['errPass'])){
                          echo $_SESSION['errPass']."<br/>";
                          unset($_SESSION['errPass']);
                        }else{

                        }

                        if(isset($_SESSION['error'])){
                          echo $_SESSION['error']."<br/>";
                          unset($_SESSION['error']);
                        }
                      ?>
                    </div>
                    <div class="col-12 noPadd">
                      <div>
                        <input type="email" placeholder="login" name="login">
                      </div>
                      <div>
                        <input type="password" placeholder="hasło" name="haslo">
                      </div>
                    </div>
                    <div class="col-12 noPadd">
                      <button>Zaloguj się</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="result">Tutaj wynik</div>
    <script>
      
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>