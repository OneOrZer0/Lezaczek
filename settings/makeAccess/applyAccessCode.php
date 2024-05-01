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

            echo "Jest ustawione a jego wartośc to: ".$_POST['selUser']; 

        }else{

            $good = false;

        }

        $good = true;

        if(isset($_POST['typeCode'])&&!empty($_POST['typeCode'])&&$_POST['typeCode']!='none'){

            echo "Jest ustawione a jego wartośc to: ".$_POST['typeCode']; 

        }else{

            $good = false;

        }

        if(isset($_POST['thisCode'])&&!empty($_POST['thisCode'])&&$_POST['thisCode']!='none'){

            echo "Jest ustawione a jego wartośc to: ".$_POST['thisCode']; 

        }else{

            $good = false;

        }

        if($good==true){

            echo "Wykonuje zadanie!";

            //Pamiętaj o tym aby dodać dane kierownika który generuje ten kod ponieważ lista ładuje się cała

        }else{

            echo "Nie można utworzyć kodu, brak wymaganych danych!";

            require_once '../../settings/makeAccess.php';

        }

    }else{

        echo "Nie masz wystarczających uprawnien";
        exit();

    }