
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
      <input type="text" name="newCity" placeholder="Nowa miejscowość">
      <input type="text" name="street" placeholder="Nazwa zejścia">
      <input type="text" name="mark" placeholder="Pinezka">
      <input type="text" name="sunbed" placeholder="Ile leżaków">
      <input type="text" name="parawan" placeholder="Ile parawanów">
      <input type="text" name="umbrela" placeholder="Ile parasoli">
      <button>Zatwierdź</button>
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