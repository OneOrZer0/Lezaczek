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

        $check=$db->prepare('SELECT * FROM notepad WHERE id_place=:idPlace');
        $check->bindValue(':idPlace', $_SESSION['idPlace'], PDO::PARAM_INT);

        if($check->execute()){

            if($check->rowCount()>0){

                $ch=$check->fetch();

                echo<<<end

                    <div class="col-12 noPadd">
                        <div class="row noMarg">

                end;

                $full=true;
                
                if($ch['sunbed']>0){ //Sprawdzamy wpisane leżaki a te które aktualnie znajdują się na stanowisku

                    $full=false;

                    $brakiA = $ch['sunbed'];

                    echo<<<end

                        <div class="col-12 col-md-4 noPadd">
                            <div class="">
                                Leżaki
                            </div>
                            <div class="">
                                Brakuje: {$brakiA}
                            </div>
                        </div>

                    end;

                }else{

                    echo<<<end

                        <div class="col-12 col-md-4 noPadd">
                            <div class="">
                                Leżaki
                            </div>
                            <div class="">
                                <span style="color: green;">Jest w pytę</span>
                            </div>
                        </div>

                    end;

                }

                if($ch['umbrella']>0){ //Sprawdzamy wpisane leżaki a te które aktualnie znajdują się na stanowisku

                    $full=false;

                    $brakiB = $ch['umbrella'];

                    echo<<<end
                        
                        <div class="col-12 col-md-4 noPadd">
                            <div class="">
                                Parasole
                            </div>
                            <div class="">
                                Braki: {$brakiB}
                            </div>
                        </div>

                    end;

                }else{

                    echo<<<end

                        <div class="col-12 col-md-4 noPadd">
                            <div class="">
                                Parasole
                            </div>
                            <div class="">
                                <span style="color: green;">Jest w pytę</span>
                            </div>
                        </div>

                    end;

                }

                if($ch['screen']>0){ //Sprawdzamy wpisane leżaki a te które aktualnie znajdują się na stanowisku

                    $full=false;

                    $brakiC = $ch['screen'];
                    
                    echo<<<end

                        <div class="col-12 col-md-4 noPadd">
                            <div class="">
                                Parawany
                            </div>
                            <div class="">
                                Braki: {$brakiC}
                            </div>
                        </div>

                    end;

                }else{

                    echo<<<end

                        <div class="col-12 col-md-4 noPadd">
                            <div class="">
                                Parawany
                            </div>
                            <div class="">
                                <span style="color: green;">Jest w pytę</span>
                            </div>
                        </div>

                    end;

                }

                if($full==false){

                    echo<<<end

                        <div class="col-12">

                            <div class="">
                                <div id="">
                                    <button disabled data-modcode="" type="button">Zakończ prace</button>
                                </div>
                            </div>

                            <div id="code-mod-form">
                                <form id="finish-work-code">
                                    <input placeholder="kod zezwalający od kierownika" type="text" name="code-mod">
                                    <button>Potwierdź</button>
                                </form>
                            </div>

                        </div>

                    end;

                }else{

                    echo<<<end

                        <div class="col-12">
                            <div class="">
                                <div id="">
                                    <button id="finish-all-work" data-modcode="" type="button">Zakończ prace</button>
                                </div>
                            </div>
                        </div>

                    end;
                }

                echo<<<end

                        </div>
                    </div>

                end;

            }else{

            }

        }else{

        }

    }else{

    }
?>

<script>
    $(document).ready(function(){
        $('#finish-all-work').click(function(){ //scenariusz kiedy wszytko trafiło zpowrotem na stanowisko

            $.ajax({
                url: './work/checkAndEnd.php',
                type: 'POST',
                success: function(response){
                    $('#displayBox').html(response);
                },
                error: function(response){
                    $('#displayBox').html(response);
                }
            });

        });
    });
</script>