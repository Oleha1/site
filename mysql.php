<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "businessauto";
$tabelUsersName = "users";
$tableComponentName = "components";
$tableComponentsItemsName = "componentsItems";
$tableContactsName = "contacts";
$tabelInformationName = "information";

$conn = mysqli_connect($servername, $username, $password);
$conn -> set_charset('utf8');

if ($conn->connect_error) {
    echo("Connection failed: ".$conn->connect_error);
    die();
}
?>