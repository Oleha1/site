<?php
require 'mysql.php';
mysqli_select_db($conn, $dbName);
if (isset($_POST['component_id'])) {
    $component_id = $_POST['component_id'];
    $sql = "DELETE FROM $tabelInformationName WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $component_id);
    if ($stmt->execute()) {
        $stmt->close();
        header("Location: adminPanel.php");
        exit();
    } else {
        echo "Ошибка при удалении компонента: " . $conn->error;
    }
    $stmt->close();
}
$conn->close();
?>