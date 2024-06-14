<?php
require './mysql.php';
$result = $conn->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbName'");
if ($result->num_rows > 0) {
    echo("Database ".$dbName." already exists");
    $conn->close();
} else {
    $sql_create_db = "CREATE DATABASE IF NOT EXISTS $dbName";
    if ($conn->query($sql_create_db) === TRUE) {

    } else {
        echo("Error creating database: ".$conn->error);
    }

    mysqli_select_db($conn, $dbName);

    $sql_create_table_users = "CREATE TABLE IF NOT EXISTS $tabelUsersName (
        id INT NOT NULL AUTO_INCREMENT,
        login VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB";
    if ($conn->query($sql_create_table_users) === TRUE) {
        $sql_insert_admin = "INSERT INTO $tabelUsersName (login, password) VALUES ('admin', 'admin')";
        if ($conn->query($sql_insert_admin) !== TRUE) {
            echo("Error adding admin record: ".$conn->error);
        }
    } else {
        echo("Error creating table '".$tabelUsersName."': ".$conn->error);
    }
    $sql_create_table_component = "CREATE TABLE IF NOT EXISTS $tableComponentName (
        id INT NOT NULL AUTO_INCREMENT,
        componentName TEXT NOT NULL,
        componentDescription TEXT NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB";
    if ($conn->query($sql_create_table_component) === TRUE) {
        $sql_insert_component1 = "INSERT INTO $tableComponentName (componentName, componentDescription) VALUES (
        'Фильтры', 'Фильтры бывают разных видов, мы рассмотрим грубой очистки топлива')";
        if ($conn->query($sql_insert_component1) !== TRUE) {
            echo("Error adding component record: ".$conn->error);
        }
        $sql_insert_component2 = "INSERT INTO $tableComponentName (componentName, componentDescription) VALUES (
        'Предохранители', 'Предохранители бывают от 5-30А и различной формы')";
        if ($conn->query($sql_insert_component2) !== TRUE) {
            echo("Error adding component record: ".$conn->error);
        }
    } else {
        echo("Error creating table '".$tableComponentName."': ".$conn->error);
    }
    $sql_create_table_componentsItems = "CREATE TABLE IF NOT EXISTS $tableComponentsItemsName (
        id INT NOT NULL AUTO_INCREMENT,
        componentName TEXT NOT NULL,
        imgPath TEXT NOT NULL,
        manufacturer TEXT NOT NULL,
        url TEXT NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB";
    if ($conn->query($sql_create_table_componentsItems) === TRUE) {
        $sql_insert_omponentsItems1 = "INSERT INTO $tableComponentsItemsName (componentName, imgPath, manufacturer, url) VALUES (
        'Фильтры', 'filter1.jpg', 'Stellox', 'https://bizavto.com/')";
        if ($conn->query($sql_insert_omponentsItems1) !== TRUE) {
            echo("Error adding component record: ".$conn->error);
        }
        $sql_insert_omponentsItems2 = "INSERT INTO $tableComponentsItemsName (componentName, imgPath, manufacturer, url) VALUES (
        'Фильтры', 'filter2.jpg', 'SELERUS', 'https://bizavto.com/')";
        if ($conn->query($sql_insert_omponentsItems2) !== TRUE) {
            echo("Error adding component record: ".$conn->error);
        }
        $sql_insert_omponentsItems3 = "INSERT INTO $tableComponentsItemsName (componentName, imgPath, manufacturer, url) VALUES (
        'Фильтры', 'filter3.jpg', 'SORL', 'https://bizavto.com/')";
        if ($conn->query($sql_insert_omponentsItems3) !== TRUE) {
            echo("Error adding component record: ".$conn->error);
        }

        $sql_insert_omponentsItems4 = "INSERT INTO $tableComponentsItemsName (componentName, imgPath, manufacturer, url) VALUES (
        'Предохранители', 'save1.jpg', 'КОПИР', 'https://bizavto.com/')";
        if ($conn->query($sql_insert_omponentsItems4) !== TRUE) {
            echo("Error adding component record: ".$conn->error);
        }
        $sql_insert_omponentsItems5 = "INSERT INTO $tableComponentsItemsName (componentName, imgPath, manufacturer, url) VALUES (
        'Предохранители', 'save2.jpg', 'АвтоЭлектро', 'https://bizavto.com/')";
        if ($conn->query($sql_insert_omponentsItems5) !== TRUE) {
            echo("Error adding component record: ".$conn->error);
        }
        $sql_insert_omponentsItems6 = "INSERT INTO $tableComponentsItemsName (componentName, imgPath, manufacturer, url) VALUES (
        'Предохранители', 'save3.jpg', 'АвтоЭлектро', 'https://bizavto.com/')";
        if ($conn->query($sql_insert_omponentsItems6) !== TRUE) {
            echo("Error adding component record: ".$conn->error);
        }
    } else {
        echo("Error creating table '".$tableComponentsItemsName."': ".$conn->error);
    }
    $sql_create_table_contacts = "CREATE TABLE IF NOT EXISTS $tableContactsName (
        id INT NOT NULL AUTO_INCREMENT,
        address TEXT NOT NULL,
        days TEXT NOT NULL,
        startTime TEXT NOT NULL,
        endTime TEXT NOT NULL,
        tel TEXT NOT NULL,
        imgPath TEXT NOT NULL,
        email TEXT NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB";
    if ($conn->query($sql_create_table_contacts) === TRUE) {
        $sql_insert_contacts1 = "INSERT INTO $tableContactsName (address, days, startTime, endTime, tel, imgPath, email) VALUES (
        'г. Курган, ул Дзержинского, д.68', 'Пн-Пт', '08:30-18:30', '18:30', '+7 3522-55-86-86', 'map.png', 'bizavto@inbox.ru')";
        if ($conn->query($sql_insert_contacts1) !== TRUE) {
            echo("Error adding component record: ".$conn->error);
        }
    } else {
        echo("Error creating table '".$tableContactsName."': ".$conn->error);
    }
    $sql_create_table_information = "CREATE TABLE IF NOT EXISTS $tabelInformationName (
        id INT NOT NULL AUTO_INCREMENT,
        informationName TEXT NOT NULL,
        informationMinDescription TEXT NOT NULL,
        informationArray TEXT NOT NULL,
        informationDescription TEXT NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB";
    if ($conn->query($sql_create_table_information) === TRUE) {
        $sql_insert_information1 = "INSERT INTO $tabelInformationName (informationName, informationMinDescription, informationArray, informationDescription) VALUES (
            'Часто заменяемые компоненты', 'В этот список попадают свое временные замены, и выходящие из строя компоненты:', 
            'Приводные ремни и фильтры
            Предохранители, сменные лампочки
            Ремни вентилятора и модуль зажигания
            Клапаны, пружины топливного насоса, тормозные шланги и колодки', 'Списко попали основные компоненты выходяшие из строя, но список достаточно большой')";
            if ($conn->query($sql_insert_information1) !== TRUE) {
                echo("Error adding component record: ".$conn->error);
            }
    } else {
        echo("Error creating table '".$tabelInformationName."': ".$conn->error);
    }
    $conn->close();
    header("Location:index.php");
}
?>