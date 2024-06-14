<footer>
    <?php
        require "./mysql.php";
    ?>
    <div class="bandDown"></div>
    <div class="containerFooter">
        <div class="container">
            <img src="./img/logo.svg" alt="">
            <div class="footerInfo">
                <a href="#head1">Производители</a>
            </div>
            <div class="footerInfo">
                <a href="#head2">Компоненты</a>
            </div>
            <div class="footerInfo">
                <a href="#head3">Контакты</a>
            </div>
        </div>
    </div>
    <?php
        mysqli_select_db($conn, $dbName);
        $sql = "SELECT * FROM $tableContactsName";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="containerFooter">';
                    echo '<div class="containerWarp">';
                        echo '<div class="footerInfo">';
                            echo '<span><mark>Адрес:</mark> '.$row['address'].'</span>';
                            echo '<span><mark>Время работы:</mark> '.$row['days'].': '.$row['startTime'].'-'.$row['endTime'].', Сб: 9:00-13:00</span>';
                            echo '<span><mark>Почта:</mark> '.$row['email'].'</span>';
                            echo '<span><mark>Телефон:</mark> '.$row['tel'].'</span>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
        }
        $conn->close();
    ?>
</footer>