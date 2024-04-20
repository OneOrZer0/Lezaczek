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

                $full=true;
                
                if($ch['sunbed']>0){ //Sprawdzamy wpisane leżaki a te które aktualnie znajdują się na stanowisku

                    $full=false;

                }else{

                }

                if($ch['umbrella']>0){ //Sprawdzamy wpisane leżaki a te które aktualnie znajdują się na stanowisku

                    $full=false;

                }else{
                    
                }

                if($ch['screen']>0){ //Sprawdzamy wpisane leżaki a te które aktualnie znajdują się na stanowisku

                    $full=false;

                }else{
                    
                }

                if($full==true){

                    //przerzucanie danych do odpowiedniej tabeli z zakonczeniem, usuwanie danych z notatnika, ustawienie stanowiska jako offline, wylogowanie uzytkownika z systemu

                    echo "Udało ci się zakończyć prace :)";

                    //Wylogowanie

                }else{

                    //Brak możliwości zatwierdzenia dancyh

                    echo '<span style="color: red;">Ze stanem sprzętu dalej jest coś nie tak, nie oszukuj systemu!</spam>';

                }

            }else{

            }

        }else{

        }

    }else{

    }