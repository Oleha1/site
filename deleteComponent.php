<?php
require 'mysql.php';
mysqli_select_db($conn, $dbName);
if (isset($_POST['component_id'])) {
    $component_id = $_POST['component_id'];
    $sql = "DELETE FROM $tableComponentName WHERE componentName = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $component_id);
    if ($stmt->execute()) {
        $sql2 = "SELECT * FROM $tableComponentsItemsName WHERE componentName = '".$component_id."'";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            while($row2 = $result2->fetch_assoc()) {
                $sql2 = "DELETE FROM $tableComponentsItemsName WHERE componentName = ?";
                $stmt2 = $conn->prepare($sql2);
                $stmt2->bind_param("s", $component_id);
                if ($stmt2->execute()) {
                    $uploadDir = 'img/';
                    $filePathToDelete = $uploadDir . $row2['imgPath'];
                    if (file_exists($filePathToDelete)) {
                        unlink($filePathToDelete);
                    }
                }
            }
        }
        $result2->close();
        header("Location: adminPanel.php");
        exit();
    } else {
        echo "Ошибка при удалении компонента: " . $conn->error;
    }
    $stmt->close();
}
$conn->close();
?>