<div id="toolsBox">
  <div class="row noMarg">
    <div class="col-8 offset-2 noPadd">
      <div class="row noMarg">
        <div class="col-md-2 col-sm-3 col-4 noPadd">
          <div class="selTool" data-plik="./settings/addUser.php">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div>
            Dodaj pracownika
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 noPadd">
          <div class="selTool" data-plik="./settings/delUser.php">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div>
            Usuń pracownika
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 noPadd">
          <div class="selTool" data-plik="./settings/listUser.php">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div>
            Lista pracowników
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 noPadd">
          <div class="selTool" data-plik="./settings/statusUser.php">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div>
            Status pracownika
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 noPadd">
          <div class="selTool" data-plik="">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div>
            Edycja pracownika
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 noPadd">
          <div class="selTool" data-plik="">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div>
            Reset hasła pracownika
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 noPadd">
          <div class="selTool" data-plik="./settings/planedWork.php">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div>
            Ustal prace
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 noPadd">
          <div class="selTool" data-plik="">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div>
            Statystyki
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 noPadd">
          <div class="selTool" data-plik="">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div>
            Zgłoszenia
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 noPadd">
          <div class="selTool" data-plik="./settings/addPlace.php">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div>
            Dodaj stanowisko
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 noPadd">
          <div class="selTool" data-plik="">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div>
            Usuń stanowisko
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 noPadd">
          <div class="selTool" data-plik="">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div>
            Edytuj stanowiska
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 noPadd">
          <div class="selTool" data-plik="./settings/listPlace.php">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div>
            Lista stanowisk
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 noPadd">
          <div class="selTool" data-plik="./settings/setPrice.php">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div>
            Ustal ceny oraz kaucje
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 noPadd">
          <div class="selTool" data-plik="">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div>
            Stan sprzętu
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 noPadd">
          <div class="selTool" data-plik="">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div>
            Statystyki przychodów
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 noPadd">
          <div class="selTool" data-plik="./settings/makeAccess.php">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div>
            Stwórz uprawnienie
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    $(".selTool").click(function(){
      var plik = $(this).data('plik');
      $.ajax({
        url: plik,
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
<?php
