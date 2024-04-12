<div id="back">
  Powrot
</div>
<div>
  Usuwanie uzytkownika
</div>
<div>
  Tutaj ustawiaj
</div>

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
