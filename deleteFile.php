<?php
require 'mysql.php';
mysqli_select_db($conn, $dbName);
if (isset($_POST['component_id'])) {
    $component_id = $_POST['component_id'];
    $sql = "DELETE FROM $tableComponentsItemsName WHERE imgPath = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $component_id);
    if ($stmt->execute()) {
        $uploadDir = 'img/';
        $filePathToDelete = $uploadDir . $component_id;
        if (file_exists($filePathToDelete)) {
            unlink($filePathToDelete);
            $conn->close();
            header("Location: adminPanel.php");
        }
        $conn->close();
        exit();
    } else {
        echo "Ошибка при удалении компонента: " . $conn->error;
    }
    $stmt->close();
}
$conn->close();
?>