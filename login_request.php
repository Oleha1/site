<?php
$login = $_POST['login'];
$pass = $_POST['password'];
require 'mysql.php';
mysqli_select_db($conn, $dbName);
if(empty($login) || empty($pass)){
    $conn->close();
    header("Location:login.php?message=inputError");
}else{
    $sql = "SELECT * FROM `$tabelUsersName` WHERE login = '$login' AND password = '$pass'";
    $result = $conn -> query($sql);
    if($result -> num_rows > 0){
        $conn->close();
        header("Location:adminPanel.php");
    } else{
        header("Location:login.php?message=error");
    }
    $conn->close();
}

?>