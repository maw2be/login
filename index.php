<?php
session_start();
if((isset($_SESSION['log_in'])) && $_SESSION['log_in']==true){
    header('Location:dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>login</title>
    </head>
    <body>
        <form action="login.php" method="post">
        Login:<br>
        <input type="text" name="login"><br>
        Password: <br>
        <input type="password" name="password"><br>
        <input type="submit" value="Login">
        </form>
        <?php
        if(isset($_SESSION['error'])) {
                echo $_SESSION['error'];
        }
        ?>
    </body>
</html>
