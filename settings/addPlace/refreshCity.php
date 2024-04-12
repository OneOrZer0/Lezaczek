<?php

  require_once '../../database.php';

?>

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