<?php
    session_start();
    $_SESSION['Authenticated']=false;
?>

<!DOCTYPE>
<html>
    <head>
        <script>
            function check_name_composition(uname){
                if(uname!=""){
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function(){
                        var message;
                        if(this.readyState==4 && this.status==200){
                            swith(this.responseText){
                                case 'YES':
                                    message = '';
                                    break;
                                case 'NO':
                                    message = '只能包含大小寫英文與數字';
                                    break;
                                default:
                                    message = 'Oops. There is something wrong.';
                                    break;
                            }
                            document.getElementById("msg0").innerHTML = message;
                        }
                        
                    };
                }
                xhttp.open("POST", "check_composition.php", true);
                xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xhttp.send("string="+uname);
                else{
                    document.getElementById("msg0").innerHTML = '';
                }
            }
            function check_phonenumber(uphone){
                if(uphone!=""){
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function(){
                        var message;
                        if(this.readyState==4 && this.status==200){
                            swith(this.responseText){
                                case 'YES':
                                    message = '';
                                    break;
                                case 'NO':
                                    message = 'The length of phone number is not correct.';
                                    break;
                                default:
                                    message = 'Oops. There is something wrong.';
                                    break;
                            }
                            document.getElementById("msg1").innerHTML = message;
                        }
                        
                    };
                }
                xhttp.open("POST", "check_phonenumber.php", true);
                xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xhttp.send("uphone="+uphone);
                else{
                    document.getElementById("msg1").innerHTML = '';
                }
            }
            function check_account(uacc){
                if(uacc!=""){
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function(){
                        var message;
                        if(this.readyState==4 && this.status==200){
                            swith(this.responseText){
                                case 'YES':
                                    message = 'The account is available.';
                                    break;
                                case 'NO':
                                    message = 'The account is not available.';
                                    break;
                                default:
                                    message = 'Oops. There is something wrong.';
                                    break;
                            }
                            document.getElementById("msg2").innerHTML = message;
                        }
                        
                    };
                }
                xhttp.open("POST", "check_account.php", true);
                xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xhttp.send("uacc="+uacc);
                else{
                    document.getElementById("msg2").innerHTML = '';
                }
            }
            function check_pwd_composition(pwd){
                if(pwd!=""){
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function(){
                        var message;
                        if(this.readyState==4 && this.status==200){
                            swith(this.responseText){
                                case 'YES':
                                    message = '';
                                    break;
                                case 'NO':
                                    message = '只能包含大小寫英文與數字';
                                    break;
                                default:
                                    message = 'Oops. There is something wrong.';
                                    break;
                            }
                            document.getElementById("msg3").innerHTML = message;
                        }
                        
                    };
                }
                xhttp.open("POST", "check_composition.php", true);
                xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xhttp.send("string="+pwd);
                else{
                    document.getElementById("msg3").innerHTML = '';
                }
            }
            function check_pwd_reType(re_pwd){
                if(re_pwd!=""){
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function(){
                        var message;
                        if(this.readyState==4 && this.status==200){
                            swith(this.responseText){
                                case 'YES':
                                    message = '';
                                    break;
                                case 'NO1':
                                    message = '請先輸入密碼再驗證';
                                    break;
                                case 'NO2':
                                    message = '密碼驗證 ≠ 密碼';
                                    break;
                                default:
                                    message = 'Oops. There is something wrong.';
                                    break;
                            }
                            document.getElementById("msg4").innerHTML = message;
                        }
                        
                    };
                }
                const pwd = document.getElementById("pwd");
                xhttp.open("POST", "check_pwd_reType.php", true);
                xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xhttp.send("re_pwd="+re_pwd+"&pwd="+pwd);
                else{
                    document.getElementById("msg4").innerHTML = '';
                }
            }
            function check_latitude(ulat){
                if(ulat!=""){
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function(){
                        var message;
                        if(this.readyState==4 && this.status==200){
                            swith(this.responseText){
                                case 'YES':
                                    message = '';
                                    break;
                                case 'NO1':
                                    message = '只能允許浮點數';
                                    break;
                                case 'NO2':
                                    message = '範圍不正確';
                                    break;
                                default:
                                    message = 'Oops. There is something wrong.';
                                    break;
                            }
                            document.getElementById("msg5").innerHTML = message;
                        }
                        
                    };
                }
                xhttp.open("POST", "check_latitude.php", true);
                xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xhttp.send("ulat="+ulat);
                else{
                    document.getElementById("msg5").innerHTML = '';
                }
            }
            function check_longitude(ulon){
                if(ulon!=""){
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function(){
                        var message;
                        if(this.readyState==4 && this.status==200){
                            swith(this.responseText){
                                case 'YES':
                                    message = '';
                                    break;
                                case 'NO1':
                                    message = '只能允許浮點數';
                                    break;
                                case 'NO2':
                                    message = '範圍不正確';
                                    break;
                                default:
                                    message = 'Oops. There is something wrong.';
                                    break;
                            }
                            document.getElementById("msg6").innerHTML = message;
                        }
                        
                    };
                }
                xhttp.open("POST", "check_longitude.php", true);
                xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xhttp.send("ulon="+ulon);
                else{
                    document.getElementById("msg6").innerHTML = '';
                }
            }
        </script>
    </head>

    <body>
        <h1>SIGN UP</h1>
        <form action="register.php" method="post">
            NAME
            <input type="text" name="uname" oninput="check_name_composition(this.value);"><label id="msg0"></label><br>
            PHONENUMBER
            <input type="text" name="uphone" oninput="check_phonenumber(this.value);"><label id="msg1"></label><br>
            ACCOUNT
            <input type="text" name="uacc" oninput="check_account(this.value);"><label id="msg2"></label><br>
            PASSWORD
            <input type="password" name="pwd" oninput="check_pwd_composition(this.value);" id='pwd'><label id="msg3"></label><br>
            RE_TYPE PASSWORD
            <input type="password" name="re_pwd" oninput="check_pwd_reType(this.value);"><label id="msg4"></label><br>
            LATITUDE
            <input type="text" name="ulat" oninput="check_latitude(this.value);"><label id="msg5"></label><br>
            LONGITUDE
            <input type="text" name="ulon" oninput="check_longitude(this.value);"><label id="msg6"></label><br>
            Already registered?
            <a href="index.php">Sign In</a><br>
            <input type="submit" value="Sign Up">
        </form>
    </body>
</html>