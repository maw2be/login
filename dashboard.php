<?php
session_start();
if (!isset($_SESSION['log_in'])){
    header('Location:index.php');
    exit();
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$user = $_SESSION['user'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
    </head>
    <body>
        <?php
        echo "Wlcome ".$user."<br>";
        echo "<a href=logout.php>Logout</a>";
        ?>
    </body>
</html>
