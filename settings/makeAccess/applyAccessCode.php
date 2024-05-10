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

        if(isset($_POST['selUser'])&&$_POST['selUser']!='none'&&!empty($_POST['selUser'])){

            $selUser = $_POST['selUser'];

            echo "Jest ustawione a jego wartośc to: ".$_POST['selUser']; 

        }else{

            $good = false;

        }

        $good = true;

        if(isset($_POST['typeCode'])&&!empty($_POST['typeCode'])&&$_POST['typeCode']!='none'){

            $typeCode = $_POST['typeCode'];

            echo "Jest ustawione a jego wartośc to: ".$_POST['typeCode']; 

        }else{

            $good = false;

        }

        if(isset($_POST['thisCode'])&&!empty($_POST['thisCode'])&&$_POST['thisCode']!='none'){

            $thisCode = $_POST['thisCode'];

            echo "Jest ustawione a jego wartośc to: ".$_POST['thisCode']; 

        }else{

            $good = false;

        }

        if($good==true){

            echo "Wykonuje zadanie!";

            //Pamiętaj o tym aby dodać dane kierownika który generuje ten kod ponieważ lista ładuje się cała

            $finCode=$db->prepare('INSERT INTO avalible_code (id, code, id_user, id_moderator, id_type_code) VALUES (NULL, :nameType, :idUser, :idModerator, :idTypeCode)');
            $finCode->bindValue(':nameType', $thisCode, PDO::PARAM_INT);
            $finCode->bindValue(':idUser', $selUser, PDO::PARAM_INT);
            $finCode->bindValue(':idModerator', $_SESSION['logged']['id'], PDO::PARAM_INT);
            $finCode->bindValue(':idTypeCode', $typeCode, PDO::PARAM_INT);

            if($finCode->execute()){

                if($finCode->rowCount()>0){

                    echo "Pomyślnie dodano kod do bazy danych, teraz można go użyć!";

                }else{

                    echo "Kodu nie udało się dodać do bazy";
                    exit();

                }

            }else{

                echo "Nie udało się wykonac operacji dodawania kodu do bazy!";
                exit();

            }

        }else{

            echo "Nie można utworzyć kodu, brak wymaganych danych!";

            require_once '../../settings/makeAccess.php';

        }

    }else{

        echo "Nie masz wystarczających uprawnien";
        exit();

    }