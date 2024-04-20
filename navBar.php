<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar w/ text</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <?php
          if($_SESSION['logged']['access']=="7"){

            echo<<<end
              <li data-buttval="adminPanel" class="nav-item">
                <div class="nav-link" id="controlPanel">Panel Admina</div>
              </li>
            end;

          }else if($_SESSION['logged']['access']=="4"){
            echo<<<end
              <li data-buttval="modPanel" class="nav-item">
                <a class="nav-link" href="#">Panel Kierownika</a>
              </li>
            end;
          }else if($_SESSION['logged']['access']=="1"){
            echo<<<end
              <li data-buttval="workerStart" class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Start</a>
              </li>

              <li data-buttval="workerPanel" class="nav-item">
                <a class="nav-link" href="#">Panel Pracownika</a>
              </li>

              <li data-buttval="endWork" class="nav-item">
                <a class="nav-link" href="#">Zakończenie pracy</a>
              </li>
            end;
          }else{

          }
        ?>
      </ul>
      <span class="navbar-text">
        <?php
          if(isset($_SESSION['logged'])){
            echo<<<end
              <form action="logout.php" method="post">
                <button>Wyloguj się</button>
              </form>
            end;
          }else{
            
          }
        ?>
      </span>
    </div>
  </div>
</nav>
<script>
  $(document).ready(function(){

    $('.nav-item').click(function(){

      console.log("Działa bo wchodze");

      var valButt = $(this).data('buttval');

      if(valButt=="endWork"){
        $link="./work/finishWork.php";
      }else{
        console.log("Inny przypadek");
        $link="./work/notFunny.php";
      }

      $.ajax({

        url: $link,
        type: 'POST',
        data: {valButt: valButt},
        success: function(response){
          $('#extra-info').html(response);
        },
        error: function(response){
          $('#extra-info').html(response);
        }

      });
    });
  });
</script> 

<!-- // 108 starostwo nwm bip, lub uzad pracy -->