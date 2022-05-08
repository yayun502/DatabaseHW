<?php
    $dbservername='localhost';
    $dbname='databasehw';
    $dbusername='root';
    $dbpassword='';

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