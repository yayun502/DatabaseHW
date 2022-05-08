<?php
    $dbservername='localhost';
    $dbname='databasehw';
    $dbusername='root';
    $dbpassword='';

    try{
        if(!isset($_POST['re_pwd'])||empty($_POST['re_pwd'])){
            echo 'FAILED';
            exit();
        }
        $re_pwd = $_POST['re_pwd'];
        $pwd = $_POST['pwd'];

        if($pwd!='' && $re_pwd == $pwd){
            echo 'YES';
        }
        else{
            if($pwd==''){
                echo 'NO1';
            }
            else{
                echo 'NO2';
            }
        }
    }
    catch(Exception $e){
        echo 'FAILED';
    }
?>