<?php
$address = $_POST['address'];
$days = $_POST['days'];
$startTime = $_POST['startTime'];
$endTime = $_POST['endTime'];
$tel = $_POST['tel'];
$file = $_FILES['fileUpload'];
$email = $_POST['email'];
require 'mysql.php';
mysqli_select_db($conn, $dbName);
if(empty($address) || empty($days) || empty($startTime) || empty($endTime) || empty($tel) || empty($email) || empty($file['name']) || $file['error'] !== UPLOAD_ERR_OK){
    $conn->close();
    header("Location:adminPanel.php?message=inputErrorAddContacts");
} else {
    if (isset($file)) {
        $uploadDir = 'img/';
        $randomFileName = uniqid() . '_' . basename($file['name']);
        $uploadFile = $uploadDir . $randomFileName;
        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            $sql_insert_admin = "INSERT INTO $tableContactsName (address, days, startTime, endTime, tel, imgPath, email) VALUES ('$address', '$days', '$startTime', '$endTime', '$tel', '$randomFileName', '$email')";
            if ($conn->query($sql_insert_admin) === TRUE) {
                $conn->close();
                header("Location:adminPanel.php");
            } else {
                echo("Error adding component: ".$conn->error);
            }
            $conn->close();
        } else {
            echo "Произошла ошибка при загрузке файла.";
        }
    }
    $conn->close();
}
?>