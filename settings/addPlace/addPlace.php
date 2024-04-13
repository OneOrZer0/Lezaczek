<?php
  if(session_status()==PHP_SESSION_ACTIVE){
    
  }else{
    session_start();
  }

  require_once '../../database.php';

  if(isset($_SESSION['idCity'])){

    //$streetA;

    echo "To jest sesja tymczasowa globalna z id miasta: ".$_SESSION['idCity'];

    $good=true;

    if(checkData($good)==true){

      echo "<button>Potwierdź</button>";
      echo "1. Dodawanie stanowiska do bazy danych!";

      //echo $street; //trzeba to zrobić w zmiennej global;nej

      echo "Wykonuje kod istniejacej miejscowosci!";
      // echo '<script>$("#toolsBox").html("<span style=\"color: green\">Właśnie udało ci się dodać nowe stanowisko do bazy danych!!</span>")</script>';
      echo '<script>$("#showInputs").html("<span style=\"color: green\">Właśnie udało ci się dodać nowe stanowisko do bazy danych!!<button id="refresh" class=\"button\">Kolejne</button></span>")</script>';

      if(addData($db,$streetA,$mark,$sunbed,$umbrela,$parawan,NULL)){
        echo "Udało się kurwa!";
      }else{
        echo "Nie udało się!";
      } //Walidacja oraz wykonanie kodu

    }else{
      echo "<button>Potwierdź</button>";
      echo "Nie wykonam tego zadania!";
    }

  }else if(!isset($_SESSION['idCity'])&&isset($_POST['newCity'])){

    //$streetA;

    echo "Wybrano nowe miasto";

    $good=true;

    if(!isset($_POST['newCity'])||empty($_POST['newCity'])){

      $good=false;

      echo '<span style="color: red">*</span><input type="text" name="newCity" placeholder="Nowa miejscowość">';
      
    }else{
      global $newCity;
      $newCity=$_POST['newCity'];

      echo '<input type="text" name="newCity" placeholder="Nowa miejscowość">';
    }

    //checkData();

    //if($good==true){
    if(checkData($good)==true){
      echo "Wykonuje kod miejscowosci ktora nie istnieje!";
      echo "<button>Potwierdź</button>";

      if(addData($db,$streetA,$mark,$sunbed,$umbrela,$parawan,$newCity)==false){
        echo "Wskazano bład!";
      }else{
        echo "UDało się!";
        echo '<script>$("#showInputs").html("<span style=\"color: green\">Właśnie udało ci się dodać nowe stanowisko do bazy danych!!</span>")</script>';
      } //Walidacja oraz wykonanie kodu

    }else{
      echo "<button>Potwierdź</button>";
      echo "Nie wykonam tego zadania!";
    }
  }else{
    echo "Nic nie wybrano!";
  }

  function checkData($status){

    $good=$status;

    if(!isset($_POST['street'])||empty($_POST['street'])){

      $good=false;

      echo '<span style="color: red">*</span><input type="text" name="street" placeholder="Ulica/nazwa zejścia">';
      
    }else{
      global $streetA;
      $streetA=$_POST['street'];

      echo '<input type="text" name="street" placeholder="Ulica/nazwa zejścia">';
    }

    if(!isset($_POST['mark'])||empty($_POST['mark'])){

      $good=false;

      echo '<span style="color: red">*</span><input type="text" name="mark" placeholder="Pinezka">';
      
    }else{
      global $mark;
      $mark=$_POST['mark'];

      echo '<input type="text" name="mark" placeholder="Pinezka">';
    }

    if(!isset($_POST['sunbed'])||empty($_POST['sunbed'])){

      $good=false;

      echo '<span style="color: red">*</span><input type="text" name="sunbed" placeholder="Ile leżaków">';
      
    }else{
      global $sunbed;
      $sunbed=$_POST['sunbed'];

      if(is_numeric($sunbed)&&$sunbed>0){
        echo '<input type="text" name="sunbed" placeholder="Ile leżaków" value="'.$sunbed.'">';
      }else{
        echo '<span style="color: red;">Zła liczba</span><input type="text" name="sunbed" placeholder="Ile leżaków">';
      }

    }

    if(!isset($_POST['parawan'])||empty($_POST['parawan'])){

      $good=false;

      echo '<span style="color: red">*</span><input type="text" name="parawan" placeholder="Ile parawanów">';
      
    }else{
      global $parawan;
      $parawan=$_POST['parawan'];

      if(is_numeric($parawan)&&$parawan>0){
        echo '<input type="text" name="parawan" placeholder="Ile parawanów" value="'.$parawan.'">';
      }else{
        echo '<span style="color: red;">Zła liczba</span><input type="text" name="parawan" placeholder="Ile parawanów">';
      }

    }

    if(!isset($_POST['umbrela'])||empty($_POST['umbrela'])){

      $good=false;

      echo '<span style="color: red">*</span><input type="text" name="umbrela" placeholder="Ile parasoli">';
      
    }else{
      global $umbrela;
      $umbrela=$_POST['umbrela'];

      if(is_numeric($umbrela)&&$umbrela>0){
        echo '<input type="text" name="umbrela" placeholder="Ile parasoli" value="'.$umbrela.'">';
      }else{
        echo '<span style="color: red;">Zła liczba</span><input type="text" name="umbrela" placeholder="Ile parasoli">';
      }
      
    }

    return $good;
  }

  function addData($db, $streetA, $mark, $sunbed, $umbrella, $screen, $newCity){

    //funkcja wykona sie tylko wtedy kiedy wszytkie dane są prawidłowe i znajdują się w zmiennych globalnyuch

    $good=false;

    if(isset($_SESSION['idCity'])){

      $check=$db->prepare('SELECT id FROM places WHERE street=:street AND id_city=:idCity');
      $check->bindValue(':idCity',$_SESSION['idCity'],PDO::PARAM_INT);
      $check->bindValue(':street',$streetA,PDO::PARAM_INT);

      if($check->execute()){ //dla znanej wcześniej ulicy

        if($check->rowCount()>0){

          $_SESSION['errStreet']='<span color="red">Nazwa ulicy już istnieje w bazie!</span>';

          echo "Istnieje taka ulica";
          return false;
          exit();

        }else{

          $good=true;

        }

      }else{

        echo "Nie udało wykonać się zapytania A";
        return false;
        exit();
      }

    }else if(isset($newCity)&&!empty($newCity)){ //dla tworzonej teraz ulicy

      echo "Wykonuje przeszukanie bazy";

      $check=$db->prepare('SELECT id FROM citys WHERE city=:city');
      $check->bindValue(':city', $newCity, PDO::PARAM_INT);
      
      if($check->execute()){

        echo "Wykonano instrukcje";

        if($check->rowCount()>0){

          echo "Taka miejscowośc już istnieje!";
          return false;
          exit();

        }else{//Teraz wykona wkładanie do bazy nowej miejscowości

          echo "Wkładanie do bazy!";

          $addCity=$db->prepare('INSERT INTO `citys` (`id`, `city`) VALUES (NULL, :city);');
          $addCity->bindValue(':city',$newCity,PDO::PARAM_STR);
          
          if($addCity->execute()){

            echo "Wykonano instrukcje!";

            if($addCity->rowCount()>0){

              echo "Rozpoczynam pobieranie id wlasnie włożonego kiasta!";

              $getID=$db->prepare('SELECT id FROM citys WHERE city=:city');
              $getID->bindValue(':city',$newCity,PDO::PARAM_INT);

              if($getID->execute()){

                if($getID->rowCount()>0){

                  $cityID=$getID->fetch(); //gdy mamy już ID miasta możemy zaczynać dodawanie

                  $good=true;
                }else{

                  echo "Nie znaleziono właśnie włożonego ID";
                  return false;
                  exit();
                }
              }else{

                echo "Nie udało wykonac się zapytania B";
                return false;
                exit();
              }

            }else{

              echo "Nie udało się włożyc nowego miasta do bazy!";
              return false;
              exit();
            }
          }else{

            echo "Nie udało się wykonać zapytania wkładania miasta do bazy!";
            return false;
            exit();
          }
        }

      }else{

        echo "Nie udało się sprawdzic czy już takie miasto istnieje!";
        return false;
        exit();
      }

      $good=true;

    }else{
      echo "Nie istnieją wskazane zmienne!";
      return false;
    }

    if($good==true){ //Wykonaj stworzenie nowego miejsca pracy

      if(isset($cityID['id'])){

        echo "ID Miejscowości to: ".$cityID['id'];
        $finalID=$cityID['id'];
      }else{

        echo "ID Miejscowości to: ".$_SESSION['idCity'];
        $finalID=$_SESSION['idCity'];
      }

      echo "Rozpoczynam tworzenie zejscia!";

      $addPlace=$db->prepare('INSERT INTO `places` (`id`, `id_city`, `street`, `mark`, `sunbeds`, `umbrellas`, `screens`) VALUES (NULL, :idCity, :street, :mark, :sunbed, :umbrella, :screen);');
      $addPlace->bindValue(':idCity',$finalID,PDO::PARAM_INT);
      $addPlace->bindValue(':street',$streetA,PDO::PARAM_INT);
      $addPlace->bindValue(':mark',$mark,PDO::PARAM_INT);
      $addPlace->bindValue(':sunbed',$sunbed,PDO::PARAM_INT);
      $addPlace->bindValue(':umbrella',$umbrella,PDO::PARAM_INT);
      $addPlace->bindValue(':screen',$screen,PDO::PARAM_INT);

      if($addPlace->execute()){

        echo "Wykonano pomyslnie!";

        if($addPlace->rowCount()>0){

          echo "Zostało umieszczone w bazie!";
        }else{

          echo "Nie udało sie umieścić tego w bazie danych!";

          return false;
          exit();
        }

      }else{
        echo "Nie udało sie wykonac wkładania do bazy!";

        return false;
        exit();
      }

      return $good;
    }else{
      return false;
    }
  }
?>