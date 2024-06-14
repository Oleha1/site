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
    ?>
    <!-- start body -->
    <div class="containerBody">
        <div class="call">
            <div class="titleCenter">
                <h1>Авторизация</h1>
            </div>
            <?php
                if(isset($_GET['message']) && $_GET['message'] == 'error'){
                    echo "<div class='errorContainer'>";
                        echo "<h3 class='error'>Нет такого пользователя!</h3>";
                    echo "</div>";
                }
                if(isset($_GET['message']) && $_GET['message'] == 'inputError'){
                    echo "<div class='errorContainer'>";
                        echo "<h3 class='error'>Заполните все поля!</h3>";
                    echo "</div>";
                }
            ?>
            <div class="login">
                <form action='./login_request.php' method="POST">
                    <p>Логин</p>
                    <input type="text" name="login" require>
                    <p>Пароль</p>
                    <input type="password" name="password" require>
                    <p></p>
                    <input type="submit" value="Войти">
                </form>
            </div>
        </div>
    </div>
    <!-- end body -->
    <?php
        include './footer.php'
    ?>
</body>
</html>