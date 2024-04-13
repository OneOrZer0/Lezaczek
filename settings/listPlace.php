<?php
  if(session_status()==PHP_SESSION_ACTIVE){

  }else{
    session_start();
  }

  if(isset($_SESSION['logged'])&&$_SESSION['logged']['access']>=4){
    require_once '../database.php';
  }else{
    header('index.php');
    exit();
  }
?>

<div>
  <div class="row noMarg">
    <div class="col-8 offset-2 noPadd">
      <div class="">
        <div class="row noMarg">
          <div class="col-12 noPadd">
            <form id="showList">
              <select name="nameCity">
                <?php
                  $list=$db->query('SELECT * FROM citys');

                  if($list->rowCount()>0){

                    echo '<option value="a">Wszytkie miejscowości</option>';
                    
                    $citys=$list->fetchAll();

                    foreach($citys as $ci){
                      echo '<option value="'.$ci['id'].'">'.$ci['city'].'</script>';
                    }

                  }else{

                    echo '<option value="0">Nie znaleziono miejscowości</option>';

                  }
                ?>
              </select>
              <button>Wyświetl</button>
            </form>
          </div>
          <div class="col-12 noPadd">
            <div id="displayList">
              Na tą chwile nic tutaj nie ma ;_;
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
      $("#showList").submit(function(event){
          // Zapobiegamy domyślnej akcji formularza (przeładowaniu strony)
          event.preventDefault();
          
          // Pobieramy dane z formularza
          var formData = $(this).serialize();
          
          // Wysyłamy żądanie AJAX
          $.ajax({
              url: './settings/listPlace/showPlace.php', // Adres URL pliku PHP, do którego wysyłamy żądanie
              type: 'POST', // Metoda żądania
              data: formData, // Dane do przesłania
              success: function(response) {
                  // Obsługa sukcesu, np. wyświetlenie odpowiedzi z serwera
                  $('#displayList').html(response);
              },
              error: function(xhr, status, error) {
                $('#displayList').html('Nie działa');
                  console.error(xhr.responseText);
              }
          });
      });
  });
</script>