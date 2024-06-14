<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/styel.css">
</head>
<body>
    <?php
        include './header.php';
        require './mysql.php';
        mysqli_select_db($conn, $dbName);
    ?>
    <!-- start body -->
    <div class="containerBody">
        <div class="call">
            <div class="titleCenter">
                <h1>Как выбрать производителя?</h1>
            </div>
            <div class="info">При выборе производителя стоит учитывать такие факторы как:</div>
            <div class="array">1. Сколько лет производитель на рынке.</div>
            <div class="array">2. Качество выпускаемого продукта</div>
            <div class="array">3. Популярность</div>
            <div class="info" id="head1">Ниже представлены наиболее популярные и качественные производители</div>
            <div class="sliderC">
                <div class="slider" id="slider">
                    <div class="slider_line" id="slider_line">
                        <img src="./img/Ametek.svg" alt="" class="slider_img">
                        <img src="./img/Bosch.svg" alt="" class="slider_img">
                        <img src="./img/Omfb.svg" alt="" class="slider_img">
                    </div>
                </div>
            </div>
        </div>
        <?php
            $sql = "SELECT * FROM $tabelInformationName";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="call" id="head1">';
                        echo '<div class="titleCenter">';
                            echo '<H1>'.$row['informationName'].'</H1>';
                        echo '</div>';
                        echo '<div class="info">'.$row['informationMinDescription'].'</div>';
                        $array = explode("\n", $row['informationArray']);
                        $count = count($array);
                        for ($i = 0; $i < $count; $i++) {
                            echo '<div class="array">'.($i + 1).'. '.$array[$i].'</div>';
                        }
                        echo '<div class="info">'.$row['informationDescription'].'</div>';
                    echo '</div>';
                }
            }
        ?>
        <?php
            $sql = "SELECT * FROM $tableComponentName";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="call" id="head2">';
                        echo '<div class="titleLeft">';
                            echo '<H1>'.$row["componentName"].'</H1>';
                        echo '</div>';
                        echo '<div class="info">'.$row["componentDescription"].'</div>';
                        echo '<div class="product">';
                        $sql2 = "SELECT * FROM $tableComponentsItemsName WHERE componentName = '" . $row['componentName'] . "'";
                        $result2 = $conn->query($sql2);
                        if ($result2->num_rows > 0) {
                            while($row2 = $result2->fetch_assoc()) {
                                echo '<div class="productCall">';
                                    echo '<img src="./img/'.$row2['imgPath'].'">';
                                    echo '<h1>Производитель: '.$row2['manufacturer'].'</h1>';
                                    echo '<div class="productButton">';
                                        echo '<a href="'.$row2['url'].'">';
                                            echo '<div class="button">';
                                                echo 'Подробнее';
                                            echo '</div>';
                                        echo '</a>';
                                    echo '</div>';
                                echo '</div>';
                            }
                        }
                        echo '</div>';
                    echo '</div>';
                }
            }
        ?>
        <?php
            $sql = "SELECT * FROM $tableContactsName";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo '<div class="call" id="head3">';
                    echo '<div class="titleCenter">';
                        echo '<H1>Контакты</H1>';
                    echo '</div>';
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="contacts">';
                            echo '<div class="contactsInfo">';
                                echo '<span><mark>Адрес:</mark> '.$row['address'].'</span>';
                                echo '<span><mark>Время работы:</mark> '.$row['days'].': '.$row['startTime'].'-'.$row['endTime'].', Сб: 09:00-13:00</span></span>';
                                echo '<span><mark>Почта:</mark> '.$row['email'].'</span>';
                                echo '<span><mark>Телефон:</mark> '.$row['tel'].'</span>';
                            echo '</div>';
                            echo '<img src="./img/'.$row['imgPath'].'" alt="map">';
                        echo '</div>';
                    }
                echo '</div>';
            }
            $conn->close();
        ?>
    </div>
    <!-- end body -->
    <?php
        include './footer.php'
    ?>
    <script src="./js/mian.js"></script>
</body>
</html>