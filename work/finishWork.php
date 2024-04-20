<?php

    if(session_status()==PHP_SESSION_ACTIVE){

    }else{
        session_start();
    }

    if(isset($_SESSION['logged'])&&$_SESSION['logged']['access']==1){

        if(file_exists('./database.php')){
            require_once './database.php';
        }else{
            require_once '../database.php';
        }

        date_default_timezone_set('Europe/Warsaw'); //Aktualna strefa czasowa

        // Pobierz aktualny czas jako czas Unix
        $nowTimeSec = time();

        // Ustaw godzinę 17:00 jako czas Unix dla dzisiejszej daty
        $targetTimeSec = strtotime(date('Y-m-d 17:00:00'));

        // Sprawdź, czy aktualny czas jest większy lub równy 17:00
        
            
            echo<<<end

                <div class="col-12 noPadd">
                    <div class="row noMarg">
                        <div class="col-12 noPadd">
            end;

                            if($nowTimeSec >= $targetTimeSec){

                                echo '<button id="finish-work" type="button">Zakończenie pracy</button>';

                            }else{

                                echo '<button disabled type="button">Jeszcze za wcześnie!</button>';

                            }

            echo<<<end
                        </div>
            end;

                            if($nowTimeSec >= $targetTimeSec){

                                

                            }else{

                                echo<<<end

                                
                                    <div class="col-12 noPadd">
                                        <button id="use-end-code" type="button">Użyj kodu zakończenia</button>
                                    </div>
                                    <div class="col-12 noPadd">
                                        <div id="end-code" style="display: none;">
                                            <form id="end-form-code">
                                                <input type="text" name="endCode">
                                                <button>Użyj</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-12 noPadd">
                                        <button id="refresh" type="button">Odświerz</button>
                                    </div>

                                end;

                            }

            echo<<<end
                        
                        <div class="col-12 noPadd">
                            <button id="hidden-butts" type="button">Ukryj całość</button>
                        </div>
                    </div>
                </div>

            end;

        } else {
            echo "Aktualny czas jest przed 17:00.";
        }

        echo<<<end

            Rozpoczynam prace nad projektem!

        end;
?>
<script>

    $(document).ready(function(){
        $('#use-end-code').click(function(){

            if($('#end-code').css('display') === 'block'){

                $('#end-code').css('display', 'none');
                $('#use-end-code').text("Użyj kodu");

            }else{

                $('#end-code').css('display', 'block');
                $('#use-end-code').text("Ukryj pole");
            }
        
        });

        $('#hidden-butts').click(function(){

            $('#extra-info').html("");

        });

        $('#refresh').click(function(){

            $.ajax({
                url: './work/finishWork.php',
                type: 'POST',
                success: function(response){

                    $('#extra-info').html(response);
                    //$('#extra-info').html("Działa");

                },
                error: function(response){

                    $('#extra-info').html(response);
                    //$('#extra-info').html("Nie działa");

                }
            });
        });

        $('#finish-work').click(function(){

            $.ajax({

                url: './work/finishCheckData.php',
                type: 'POST',
                success: function(response){
                    $('#extra-info').html(response);
                },
                error: function(response){
                    $('#extra-info').html(response);
                }

            });

        });

    });

</script>

