<div id="infoBox">

  <?php

  if(session_status()==PHP_SESSION_ACTIVE){
    
  }else{
    session_start();
  }

  if(!isset($_SESSION['logged'])||$_SESSION['logged']['access']<4){
    header('Location: index.php');
    exit();
  }else{
    require_once '../database.php';
  }

  if(isset($_POST['name'])){

    $good=true;

    if($_POST['name']!=""){
      echo "Dodano uzytkownika!";
      $name=$_POST['name'];
    }else{
      $_SESSION['errName']='<span style="color: red;">*</span>';
      $good=false;
    }

    if($_POST['surname']!=""){
      echo "Dodano uzytkownika!";
      $surname=$_POST['surname'];
    }else{
      $_SESSION['errSurname']='<span style="color: red;">*</span>';
      $good=false;
    }

    if($_POST['email']!=""){
      echo "Dodano uzytkownika!";
      $email=$_POST['email'];
    }else{
      $_SESSION['errEmail']='<span style="color: red;">*</span>';
      $good=false;
    }

    if($_POST['passA']!=""){
      echo "Dodano uzytkownika!";
      $passA=$_POST['passA'];
    }else{
      $_SESSION['errPassA']='<span style="color: red;">*</span>';
      $good=false;
    }

    if($_POST['passB']!=""){
      echo "Dodano uzytkownika!";
      $passB=$_POST['passB'];
    }else{
      $_SESSION['errPassB']='<span style="color: red;">*</span>';
      $good=false;
    }

    if($_POST['tel']!=""){
      echo "Dodano uzytkownika!";
      $tel=$_POST['tel'];
    }else{
      $_SESSION['errTel']='<span style="color: red;">*</span>';
      $good=false;
    }

    if($_POST['pesel']!=""){
      echo "Dodano uzytkownika!";
      $pesel=$_POST['pesel'];
    }else{
      $pesel="";
    }

    if($_POST['city']!=""){
      echo "Dodano uzytkownika!";
      $city=$_POST['city'];
    }else{
      $city="";
    }

    if($_POST['street']!=""){
      echo "Dodano uzytkownika!";
      $street=$_POST['street'];
    }else{
      $street="";
    }

    if($_POST['nrHome']!=""){
      echo "Dodano uzytkownika!";
      $nrHome=$_POST['nrHome'];
    }else{
      $nrHome="";
    }

    if($_POST['access']!=0){
      echo "Dodano uzytkownika!";
      $access=$_POST['access'];
    }else{
      $_SESSION['errAccess']='<span style="color: red;">*</span>';
      $good=false;
    }

    if($good==true){

      //sprawdzenie czy taki email już istnieje w bazie
      $check=$db->prepare('SELECT id FROM users WHERE email=:email');
      $check->bindValue(':email',$email,PDO::PARAM_STR);
      $check->execute();

      if($check->execute()){

        if($check->rowCount()>0){
          $_SESSION['error']="Uzytkownik o takim adresie e-mail już istnieje!";
        }else{

          if($passA==$passB){
            $hashPass=password_hash($passA,PASSWORD_DEFAULT);
            
            $addUser=$db->prepare('INSERT INTO `users` (`id`, `name`, `surname`, `email`, `pass`, `tel`, `pesel`, `status`, `access`, `city`, `street`, `nr_home`) VALUES (NULL, :name, :surname, :email, :pass, :tel, :pesel, :status, :access, :city, :street, :nr_home);');
            $addUser->bindValue(':name', $name, PDO::PARAM_STR);
            $addUser->bindValue(':surname', $surname, PDO::PARAM_STR);
            $addUser->bindValue(':email', $email, PDO::PARAM_STR);
            $addUser->bindValue(':pass', $hashPass, PDO::PARAM_STR);
            $addUser->bindValue(':tel', $tel, PDO::PARAM_INT);
            $addUser->bindValue(':pesel', $pesel, PDO::PARAM_INT);
            $addUser->bindValue(':status', "offline", PDO::PARAM_STR);
            $addUser->bindValue(':access', $access, PDO::PARAM_INT);
            $addUser->bindValue(':city', $city, PDO::PARAM_STR);
            $addUser->bindValue(':street', $street, PDO::PARAM_STR);
            $addUser->bindValue(':nr_home', $nrHome, PDO::PARAM_STR);
            //$addUser->execute();

            unset($name);
            unset($surname);
            unset($email);
            unset($hashPass);
            unset($passA);
            unset($passB);
            unset($tel);
            unset($pesel);
            unset($access);
            unset($city);
            unset($city);
            unset($street);
            unset($nrHome);
    
            if($addUser->execute()){
              echo "Udało się dodać użytkownika do bazy danych!";
            }else{
              $_SESSION['error']="Nie udało się wyklonać operacji dodawania!";
            }
    
          }else{
            $_SESSION['error']="Hasła nie są poprawne!";
          }
        }

      }else{

      }
      //sprawdzenie czy taki pesel już istnieje w bazie

    }else{

    }
    
  }else{
    echo "Nie podano danych!";
  }

  ?>
  
  <div>
    <button id="back" type="button">Powrot</button>
  </div>
  <div class="row noMarg">
    <div class="col-8 offset-2 noPadd formBox">
      <div class="titleBar">
        <h1>DODAWANIE UŻYTKOWNIKA</h1>
      </div>
      <div class="">
        <form id="formAddUser">
          <div class="row noMarg">
            <?php
              if(isset($_SESSION['errName'])){
                echo $_SESSION['errName'];
                unset($_SESSION['errName']);
              }else{

              }
            ?>
            <div class="col-12 col-sm-4 col-md-3 oneIn"><input type="text" placeholder="Imie" name="name"></div>
            <?php
              if(isset($_SESSION['errSurname'])){
                echo $_SESSION['errSurname'];
                unset($_SESSION['errSurname']);
              }else{
                
              }
            ?>
            <div class="col-12 col-sm-4 col-md-3 oneIn"><input type="text" placeholder="Nazwisko" name="surname"></div>
            <?php
              if(isset($_SESSION['errEmail'])){
                echo $_SESSION['errEmail'];
                unset($_SESSION['errEmail']);
              }else{
                
              }
            ?>
            <div class="col-12 col-sm-4 col-md-3 oneIn"><input type="email" placeholder="E-Mail" name="email"></div>
            <?php
              if(isset($_SESSION['errPassA'])){
                echo $_SESSION['errPassA'];
                unset($_SESSION['errPassA']);
              }else{
                
              }
            ?>
            <div class="col-12 col-sm-4 col-md-3 oneIn"><input type="password" placeholder="Hasło" name="passA"></div>
            <?php
              if(isset($_SESSION['errPassB'])){
                echo $_SESSION['errPassB'];
                unset($_SESSION['errPassB']);
              }else{
                
              }
            ?>
            <div class="col-12 col-sm-4 col-md-3 oneIn"><input type="password" placeholder="Powtórz hasło" name="passB"></div>
            <?php
              if(isset($_SESSION['errTel'])){
                echo $_SESSION['errTel'];
                unset($_SESSION['errTel']);
              }else{
                
              }
            ?>
            <div class="col-12 col-sm-4 col-md-3 oneIn"><input type="text" placeholder="nr. Telefonu" name="tel"></div>
            <div class="col-12 col-sm-4 col-md-3 oneIn"><input type="text" placeholder="Pesel" name="pesel"></div>
            <div class="col-12 col-sm-4 col-md-3 oneIn"><input type="text" placeholder="Miasto" name="city"></div>
            <div class="col-12 col-sm-4 col-md-3 oneIn"><input type="text" placeholder="Ulica" name="street"></div>
            <div class="col-12 col-sm-4 col-md-3 oneIn"><input type="text" placeholder="Numer domu/Mieszkania" name="nrHome"></div>
            <?php
              if(isset($_SESSION['errAccess'])){
                echo $_SESSION['errAccess'];
                unset($_SESSION['errAccess']);
              }else{
                
              }
            ?>
            <div class="col-12 col-sm-4 col-md-3 oneIn">
              <select name="access">
                <option value="0">Wybierz dostęp</option>
                <option value="1">Pracownik</option>
                <option value="4">Kierownik</option>
                <option value="7">Administrator</option>
              </select>
            </div>
            <div class="col-12 noPadd">
              <div class="row noMarg">
                <div class="col-3 offset-3 inButt">
                  <div>
                    <button type="button">Wyczysc wpisane dane</button>
                  </div>
                </div>
                <div class="col-3 inButt">
                  <div>
                    <button>Potwierdź dane</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div>
    Tutaj ustawiaj
  </div>
  <div id="wynik">
    Dział?
  </div>
</div>

<script>
  $(document).ready(function(){
      $("#formAddUser").submit(function(event){
          // Zapobiegamy domyślnej akcji formularza (przeładowaniu strony)
          event.preventDefault();
          
          // Pobieramy dane z formularza
          var formData = $(this).serialize();
          
          // Wysyłamy żądanie AJAX
          $.ajax({
              url: './settings/adduser.php', // Adres URL pliku PHP, do którego wysyłamy żądanie
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


<script>
  $(document).ready(function(){
    $("#back").click(function(){
      $.ajax({
        url: 'control7.php',
        type: 'POST',
        success: function(response) {
            // Aktualizacja zawartości diva
            $("#toolsBox").html(response);
        },
        error: function(xhr, status, error) {
            // Obsługa błędów
            console.error(xhr.responseText);
        }
      });
    });
  });
</script>
