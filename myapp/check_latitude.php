<?php
    $dbservername='localhost';
    $dbname='databasehw';
    $dbusername='root';
    $dbpassword='';

    try{
        if(!isset($_POST['ulat'])||empty($_POST['ulat'])){
            echo 'FAILED';
            exit();
        }
        $tmp = $_POST['ulat'];
        $ulat = (float)$tmp;

        if(is_numeric($tmp)){
            if($ulat >= -90.0 && $ulat <= 90.0){
                echo 'YES';
            }
            else{
                echo 'NO2';
            }
        }
        else{
            echo 'NO1';
        }
    }
    catch(Exception $e){
        echo 'FAILED';
    }
?>