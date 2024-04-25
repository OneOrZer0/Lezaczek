<?php

    if(session_status()==PHP_SESSION_ACTIVE){

    }else{
        session_start();
    }

    if(isset($_SESSION['logged'])&&$_SESSION['logged']['access']>=4){

        if(file_exists('./database.php')){
            require_once './database.php';
        }else{
            require_once '../database.php';
        }

    }else{
        exit();
    }

?>

<div class="col-6 offset-3 noPadd">
    <div class="row noMarg">

        <div class="col-12 noPadd">
            <div class="">
                <div class="row noMarg">

                    <div class="col-6 noPadd">
                        Wybierz dla którego użytkownika chcesz stworzyć kod dostępu
                    </div>

                    <div class="col-6 noPadd">
                        <div id="accessBox">
                            <form id="maUser">
                                <select name="selUser">
                                    <?php

                                        $loadUser=$db->query('SELECT * FROM users WHERE access=1');

                                        if($loadUser->rowCount()>0){

                                            echo "<option value=\"none\">Wybierz pracownika</option>";

                                            $loadU=$loadUser->fetchAll();

                                            foreach($loadU as $lu){

                                                echo '<option value="'.$lu['id'].'">'.'['.$lu['id'].']. '.$lu['name'].' '.$lu['surname'].'</option>';

                                            }

                                        }else{
                                            echo "<option>Bark pracowników</option>";
                                        }

                                    ?>
                                </select>
                                <button>Wybierz</button>
                            </form>
                        </div>
                        <div class="row noMarg">
                            <div class="col-12 noPadd">
                                <div id="accessBoxInfo">
                                    Tutaj pojawi się reszta ustwien
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 noPadd">
            <div class="row noMarg">
                <div class="col-12 noPadd">

                </div>
            </div>
        </div>

        <div class="col-6 noPadd">
        </div>

    </div>
</div>
<script>
    $(document).ready(function(){
        $('#maUser').submit(function(event){

            event.preventDefault();

            var dane = $(this).serialize();

            $.ajax({

                url: './settings/makeAccess/checkUserAccess.php',
                type: 'POST',
                data: dane,
                success: function(response){
                    $('#accessBoxInfo').html(response);
                },
                error: function(response){
                    $('#accessBoxInfo').html("Coś poszło nie tak");
                }

            });
        });
    });
</script>