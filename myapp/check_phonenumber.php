<?php
    $dbservername='localhost';
    $dbname='examdb';
    $dbusername='examdb';
    $dbpassword='examdb';

    try{
        if(!isset($_POST['uphone'])||empty($_POST['uphone'])){
            echo 'FAILED';
            exit();
        }
        $uphone = $_POST['uphone'];

        if(strlen($uphone) == 10){
            echo 'YES';
        }
        else{
            echo 'NO';
        }
    }
    catch(Exception $e){
        echo 'FAILED';
    }
?>