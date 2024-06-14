<?php
$component_id = $_POST['component_id'];
$manufacturer = $_POST['manufacturer'];
$url = $_POST['url'];
$file = $_FILES['fileUpload'];
require 'mysql.php';
mysqli_select_db($conn, $dbName);
if(empty($component_id) || empty($manufacturer) || empty($url) || empty($file['name']) || $file['error'] !== UPLOAD_ERR_OK){
    $conn->close();
    header("Location:adminPanel.php?message=inputErrorUploadFile");
} else {
    if (isset($file)) {
        $uploadDir = 'img/';
        $randomFileName = uniqid() . '_' . basename($file['name']);
        $uploadFile = $uploadDir . $randomFileName;
        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            $sql_insert_admin = "INSERT INTO $tableComponentsItemsName (componentName, imgPath, manufacturer, url) VALUES ('$component_id', '$randomFileName', '$manufacturer', '$url')";
            if ($conn->query($sql_insert_admin) === TRUE) {
                $conn->close();
                header("Location:adminPanel.php");
            } else {
                echo ("Error adding component: ".$conn->error);
            }
            $conn->close();
        } else {
            echo "Произошла ошибка при загрузке файла.";
        }
    }
    $conn->close();
}
?>