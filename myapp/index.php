<?php
    session_start();
    session_unset();
    session_destroy();
    $_SESSION['Authenticated']=false;
?>

<!DOCTYPE>
<html>
    <body>
        <h1>SIGN IN</h1>
        <form action="login.php" method="post">
            ACCOUNT
            <input type="text" name="uacc"><br>
            PASSWORD
            <input type="password" name="pwd"><br>
            Not register?
            <a href="signUp.php">Sign Up</a><br>
            <input type="submit" value="Sign In">
        </form>
    </body>
</html>