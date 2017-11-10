<?php

session_start();
if ((!isset($_POST['login'])) || (!isset($_POST['password']))) {
    header('Location:index.php');
    exit();
}
require_once 'config.php';

$connection = @new mysqli($db_host, $db_name, $db_password, $db);

if ($connection->connect_errno != 0) {
    echo "Error:" . $connection->connect_errno;
} else {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $password = htmlentities($password, ENT_QUOTES, "UTF-8");

    if ($result = $connection->query(
                    sprintf("SELECT * FROM users WHERE name = '%s' AND password = '%s'", 
                    mysqli_real_escape_string($connection, $login), 
                    mysqli_real_escape_string($connection, $password)))) {
        $no_users = $result->num_rows;
        if ($no_users > 0) {
            $_SESSION['log_in'] = true;
            $row = $result->fetch_assoc();
            $_SESSION['id'] = $row['ID'];
            $_SESSION['user'] = $row['name'];
            unset($_SESSION['error']);
            $result->close();
            header('Location: dashboard.php');
        } else {
            $_SESSION['error'] = '<span style="color:red;">Wrong login or password</span>';
            header('Location:index.php');
        }
    }

    $connection->close();
}
?>