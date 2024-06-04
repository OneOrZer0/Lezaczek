
<?php 

  if(session_status()==PHP_SESSION_ACTIVE){
      
  }else{
    session_start();
  }

  if($_POST['selCity']=="0"){
    echo "Nie wybrano operacji!";
  }else if($_POST['selCity']=='n'){

    if(isset($_SESSION['idCity'])){
      unset($_SESSION['idCity']);
    }else{

    }

    echo<<<end
      <div class="row noMarg">
        <div class="col-10 offset-1 noPadd">
          <div class="">
            <div class="row noMarg">
              <div class="col-12 noPadd">
                <div class="titleBar">
                  <h1>DODAWANIE NOWEGO STANOWISKA</h1>
                </div>
              </div>

              <div class="col-2 inOne noPadd">
                <input type="text" name="newCity" placeholder="Nowa miejscowość">
              </div>
              <div class="col-2 inOne noPadd">
                <input type="text" name="street" placeholder="Nazwa zejścia">
              </div>
              <div class="col-2 inOne noPadd">
                <input type="text" name="mark" placeholder="Pinezka">
              </div>
              <div class="col-2 inOne noPadd">
                <input type="text" name="sunbed" placeholder="Ile leżaków">
              </div>
              <div class="col-2 inOne noPadd">
                <input type="text" name="parawan" placeholder="Ile parawanów">
              </div>
              <div class="col-2 inOne noPadd">
                <input type="text" name="umbrela" placeholder="Ile parasoli">
              </div>

              <div class="col-2 inOne noPadd">
                <button>Zatwierdź</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    end;

  }else{

    $_SESSION['idCity']=$_POST['selCity'];

    echo<<<end
      <input type="text" name="street" placeholder="Nazwa zejścia">
      <input type="text" name="mark" placeholder="Pinezka">
      <input type="text" name="sunbed" placeholder="Ile leżaków">
      <input type="text" name="parawan" placeholder="Ile parawanów">
      <input type="text" name="umbrela" placeholder="Ile parasoli">
      <button>Zatwierdź</button>
    end;
  }