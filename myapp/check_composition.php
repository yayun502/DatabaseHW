<?php
    $dbservername='localhost';
    $dbname='databasehw';
    $dbusername='root';
    $dbpassword='';

    try{
        if(!isset($_POST['string'])||empty($_POST['string'])){
            echo 'FAILED';
            exit();
        }
        $string = $_POST['string'];

        if(ctype_alnum($string)){
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