<?php
    $dbservername='localhost';
    $dbname='databasehw';
    $dbusername='root';
    $dbpassword='';

    try{
        if(!isset($_POST['ulon'])||empty($_POST['ulon'])){
            echo 'FAILED';
            exit();
        }
        $tmp = $_POST['ulon'];
        $ulon = (float)$tmp;

        if(is_numeric($tmp)){
            if($ulon >= -180.0 && $ulon <= 180.0){
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