<div id="toolsBox">
  <div class="row noMarg">
    <div class="col-sm-12 col-md-8 offset-md-2 noPadd">
      <div class="row noMarg">
        <div class="col-md-2 col-sm-3 col-4 selToolBox">
          <div class="selTool" data-plik="./settings/addUser.php">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div class="toolTitle">
            Dodaj pracownika
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 selToolBox">
          <div class="selTool" data-plik="./settings/delUser.php">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div class="toolTitle">
            Usuń pracownika
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 selToolBox">
          <div class="selTool" data-plik="./settings/listUser.php">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div class="toolTitle">
            Lista pracowników
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 selToolBox">
          <div class="selTool" data-plik="./settings/statusUser.php">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div class="toolTitle">
            Status pracownika
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 selToolBox">
          <div class="selTool" data-plik="">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div class="toolTitle">
            Edycja pracownika
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 selToolBox">
          <div class="selTool" data-plik="">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div class="toolTitle">
            Reset hasła pracownika
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 selToolBox">
          <div class="selTool" data-plik="./settings/planedWork.php">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div class="toolTitle">
            Ustal prace
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 selToolBox">
          <div class="selTool" data-plik="">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div class="toolTitle">
            Statystyki
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 selToolBox">
          <div class="selTool" data-plik="">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div class="toolTitle">
            Zgłoszenia
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 selToolBox">
          <div class="selTool" data-plik="./settings/addPlace.php">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div class="toolTitle">
            Dodaj stanowisko
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 selToolBox">
          <div class="selTool" data-plik="">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div class="toolTitle">
            Usuń stanowisko
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 selToolBox">
          <div class="selTool" data-plik="">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div class="toolTitle">
            Edytuj stanowiska
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 selToolBox">
          <div class="selTool" data-plik="./settings/listPlace.php">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div class="toolTitle">
            Lista stanowisk
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 selToolBox">
          <div class="selTool" data-plik="./settings/setPrice.php">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div class="toolTitle">
            Ustal ceny oraz kaucje
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 selToolBox">
          <div class="selTool" data-plik="">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div class="toolTitle">
            Stan sprzętu
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 selToolBox">
          <div class="selTool" data-plik="">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div class="toolTitle">
            Statystyki przychodów
          </div>
        </div>

        <div class="col-md-2 col-sm-3 col-4 selToolBox">
          <div class="selTool" data-plik="./settings/makeAccess.php">
            <img src="grafika/ikony/ikona.png" alt="Pracownicy">
          </div>
          <div class="toolTitle">
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
