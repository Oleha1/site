<?php
$informationName = $_POST['informationName'];
$informationMinDescription = $_POST['informationMinDescription'];
$informationArray = $_POST['informationArray'];
$informationDescription = $_POST['informationDescription'];
require 'mysql.php';
mysqli_select_db($conn, $dbName);
if(empty($informationName) || empty($informationMinDescription) || empty($informationArray) || empty($informationDescription)){
    $conn->close();
    header("Location:adminPanel.php?message=inputErrorAddInformation");
} else {
    $sql_insert_admin = "INSERT INTO $tabelInformationName (informationName, informationMinDescription, informationArray, informationDescription) VALUES ('$informationName', '$informationMinDescription', '$informationArray', '$informationDescription')";
    if ($conn->query($sql_insert_admin) === TRUE) {
        $conn->close();
        header("Location:adminPanel.php");
    } else {
        echo("Error adding component: ".$conn->error);
    }
    $conn->close();
}
?>