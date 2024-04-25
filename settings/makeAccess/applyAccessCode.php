<?php

    if(session_status()==PHP_SESSION_ACTIVE){



    }else{

        session_start();

    }

    if(isset($_SESSION['logged'])&&$_SESSION['logged']['access']>=4){

        $good = true;

        if(isset($_POST['typeCode'])){

            echo "Jest ustawione a jego wartośc to: ".$_POST['typeCode']; 

        }else{

            $good = false;

        }

        if(isset($_SESSION['thisCode'])){

            echo "Jest ustawione a jego wartośc to: ".$_POST['thisCode']; 

        }else{

            $good = false;

        }

        if($good==true){

            echo "Wykonuje zadanie!";

        }else{

            echo "Nie można utworzyć kodu, brak wymaganych danych!";

        }

    }else{

        echo "Nie masz wystarczających uprawnien";
        exit();

    }