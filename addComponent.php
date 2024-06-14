<?php
$component = $_POST['component'];
$componentDescription = $_POST['componentDescription'];
require 'mysql.php';
mysqli_select_db($conn, $dbName);
if(empty($component) || empty($componentDescription)){
    $conn->close();
    header("Location:adminPanel.php?message=inputErrorAddComponent");
}else{
    $sql_insert_admin = "INSERT INTO $tableComponentName (componentName, componentDescription) VALUES ('$component', '$componentDescription')";
    if ($conn->query($sql_insert_admin) === TRUE) {
        $conn->close();
        header("Location:adminPanel.php");
    } else {
        echo("Error adding component: ".$conn->error);
    }
    $conn->close();
}
?>