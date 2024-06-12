<?php
include 'config/settings.php';

$username_email = $_SESSION['signin-data']['username_email'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;

unset($_SESSION['signin-data']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вхід</title>

    <link rel="stylesheet" href="./css/style.css">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,800;1,700&display=swap" rel="stylesheet"> 
</head>
<body>
<section class="form__section">
    <div class="container form__section-container">
        <h2>Вхід</h2>
        <?php
        if(isset($_SESSION['signup-success'])): 
        ?> 
            <div class="alert__message success">
            <p>
                <?= $_SESSION['signup-success'];
                unset($_SESSION['signup-success']);
                ?>
            </p>
            </div>
        <?php elseif(isset($_SESSION['signin'])): ?>
            <div class="alert__message error">
                <p>
                    <?=$_SESSION['signin'];
                    unset($_SESSION['signin']); 
                    ?>
                </p>
            </div>
        <?php endif; ?>
        <form action="<?= ROOT_URL ?>signin-logic.php" method="POST">
            <input type="text" name="username_email" value='<?= $username_email ?>' placeholder="Логін або Email">
            <input type="password" name="password" value='<?= $password ?>' placeholder=" Пароль">
            <button type="submit" class="btn" name="submit">Увійти</button>
            <small>Досі не зареєстровані? <a href="signup.php">Зареєструватись</a></small>
        </form>
    </div>
</section>
</body>
</html>