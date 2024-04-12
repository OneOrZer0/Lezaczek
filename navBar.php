<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar w/ text</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>

        <?php
          if($_SESSION['logged']['access']=="7"){

            echo<<<end
              <li class="nav-item">
                <div class="nav-link" id="controlPanel">Panel Admina</div>
              </li>
            end;

          }else if($_SESSION['logged']['access']=="4"){
            echo<<<end
              <li class="nav-item">
                <a class="nav-link" href="#">Panel Kierownika</a>
              </li>
            end;
          }else if($_SESSION['logged']['access']=="1"){
            echo<<<end
              <li class="nav-item">
                <a class="nav-link" href="#">Panel Pracownika</a>
              </li>
            end;
          }else{

          }
        ?>

        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
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