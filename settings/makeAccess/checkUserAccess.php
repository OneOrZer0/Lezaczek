<?php

    if(session_status()==PHP_SESSION_ACTIVE){

    }else{
        session_start();
    }

    if(isset($_SESSION['logged'])&&$_SESSION['logged']['access']>=4){

        if(file_exists('../../database.php')){
            require_once '../../database.php';
        }else{
            require_once '../database.php';
        }

        // echo $_POST['selUser']; //ID | ID_USER | ID_MOD | TYPE_CODE | ACCESS_CODE - do logów

        $selUser = $_POST['selUser'];

        if($selUser=="none"){

            

        }else{

            echo<<<end

                <form id="applyCode">
                    <select name="typeCode">
                        <option value="none">Wybierz typ kodu</option>
            end;

                            $showType=$db->query('SELECT * FROM type_code');

                            if($showType->rowCount()>0){

                                $showT=$showType->fetchAll();

                                foreach($showT as $st){

                                    echo '<option value="'.$st['id'].'">'.$st['name'].'</option>';

                                }

                            }else{
                                
                            }
            
            echo<<<end
                    </select>
                    <input name="thisCode" type="text" placeholder="Kod dostępu">
                    <button>Potwierdź kod dostępu</button>
                </form>

            end;

        }

    }else{

        echo "Brak wymaganaych uprawnień na wykonane tej operacji!";
        exit();

    }
?>
<script>
    $(document).ready(function(){
        $('#applyCode').submit(function(event){

            event.preventDefault();

            var dane = $(this).serialize();

            $.ajax({

                url: './settings/makeAccess/applyAccessCode.php',
                type: 'POST',
                data: dane,
                success(function(response){

                    $('#accessBoxInfo').html(response);

                }),
                error(function(response){

                    $('#accessBoxInfo').html("Coś poszło nie tak!");

                })

            });
        });
    });
</script>