<?php

  if(session_status()==PHP_SESSION_ACTIVE){

  }else{
    session_start();
  }

  if(isset($_SESSION['logged'])&&$_SESSION['logged']['access']>=4){

    require_once '../../database.php';

    $filtr=$_POST['dane'];

    if($filtr=='high'){

      $show=$db->query('SELECT users.* FROM users, planed WHERE planed.id_user=users.id');

    }else if($filtr=='low'){

      $show=$db->query('SELECT * FROM users WHERE users.access=1 AND id NOT IN (SELECT id_user FROM planed);');

    }else if($filtr=="medium"){
      
      $show=$db->query('SELECT * FROM users WHERE access=1 AND status="blocked" ');

    }else{
      $show=$db->query('SELECT * FROM users WHERE access=1');
    }
    // $show=$db->prepare('SELECT * FORM users WHERE ');

    //Najpierw zrobiłem żeby wszyscy uzytkownicy byli widziani

    $showAll=$show->fetchAll();
    
    foreach($showAll as $sa){

      echo<<<end

        <div class="row noMarg">
          <div class="col-2 noPadd">
            {$sa['name']}
          </div>
          <div class="col-2 noPadd">
            {$sa['surname']}
          </div>
          <div class="col-2 noPadd">
            {$sa['tel']}
          </div>
          <div class="col-2 noPadd">
            {$sa['email']}
          </div>
          <div class="col-2 noPadd">
            
          </div>
          <div class="col-2 noPadd">
            <input type="radio" name="selWorker" value="{$sa['id']}">
          </div>
        </div>

      end;

    }

    echo '<button>Potwierdź swój wybór</button>';

  }else{
    header('Location: index.php');
    exit();
  }

?>