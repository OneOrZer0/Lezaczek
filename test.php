<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Wykonanie skryptu PHP bez przeładowania strony</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#mojDiv").click(function(){
        $.ajax({
            url: 'skrypt.php',
            type: 'POST',
            data: { key: 'value' }, // Jeśli chcesz przekazać dane do skryptu PHP
            success: function(response) {
                // Aktualizacja zawartości diva
                $("#wynik").html(response);
            },
            error: function(xhr, status, error) {
                // Obsługa błędów
                console.error(xhr.responseText);
            }
        });
    });
});
</script>
</head>
<body>

<div id="mojDiv">Kliknij mnie</div>
<div id="wynik"></div>

</body>
</html>
