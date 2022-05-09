<?php
    session_start();
    $_SESSION['Authenticated']=false;

    $dbservername='localhost';
    $dbname='databasehw';
    $dbusername='root';
    $dbpassword='';


    try{
        if(!isset($_POST['uname'])||!isset($_POST['uphone'])||!isset($_POST['uacc'])||!isset($_POST['pwd'])||!isset($_POST['re_pwd'])||!isset($_POST['ulat'])||!isset($_POST['ulon'])){
            header("Location: index.php");
            exit();
        }
        if(empty($_POST['uname'])||empty($_POST['uphone'])||empty($_POST['uacc'])||empty($_POST['pwd'])||empty($_POST['re_pwd'])||empty($_POST['ulat'])||empty($_POST['ulon'])){
            throw new Exception('欄位空白');
        }
        if($_POST['pwd']!=$_POST['re_pwd']){
            throw new Exception('密碼驗證 ≠ 密碼');
        }
        if(ctype_alnum($_POST['pwd'])||ctype_alnum($_POST['uacc'])||(strlen($_POST['uphone'])!=10 && is_numeric($_POST['uphone']))){
            throw new Exception('格式不對');
        }
        $uname = $_POST['uname'];
        $uphone = $_POST['uphone'];
        $uacc = $_POST['uacc'];
        $pwd = $_POST['pwd'];
        $ulat = $_POST['ulat'];
        $ulon = $_POST['ulon'];
        $conn = new PDO("mysql:host=$dbservername;dbname=$dbname",$dbusername,$dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("select account from users where account=:account");
        $stmt->execute(array('account'=>$uacc));

        if($stmt->rowCount()==0){
            $salt = strval(rand(1000,9999));
            $hashvalue = hash('sha256', $salt.$pwd);
            $stmt = $conn->prepare("insert into users(name, phonenumber, account, password, salt, latitude, longitude)
            values(:name,:phonenumber, :account, :password, :salt, :latitude, :longitude)");
            $stmt->execute(array('name'=>$uname, 'phonenumber'=>$uphone, 'account'=>$uacc, 'password'=>$hashvalue, 'salt'=>$salt, 'latitude'=>$ulat, 'longitude'=>$ulon));
            $_SESSION['Authenticated'] = true;
            $_SESSION['Name'] = $uname;
            $_SESSION['Phonenumber'] = $uphone;
            $_SESSION['Account'] = $uacc; 
            $_SESSION['Lattitude'] = $ulat; 
            $_SESSION['Longitude'] = $ulon;
            echo <<< EOT
            <!DOCTYPE>
            <html>
                <body>
                    <script>
                    alert("Register success!!");
                    window.location.replace("home.php");
                    </script>
                </body>
            </html>
            EOT;
            exit();
        }
        else{
            throw new Exception("Account has been registered!!");
        }
    }
    catch(Exception $e){
        $msg = $e->getMessage();
        session_unset();
        session_destroy();
        echo <<< EOT
            <!DOCTYPE>
            <html>
                <body>
                    <script>
                    alert("$msg");
                    window.location.replace("signUp.php");
                    </script>
                </body>
            </html>
        EOT;
    }
?>