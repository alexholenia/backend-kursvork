<?php
include "component/header.php";
if(!isset($_SESSION['user_is_admin'])){
    header("location: " . ROOT_URL . "logout.php");

    session_destroy();
}

$firstname=$_SESSION['add-user-data']['firstname'] ?? null;
$lastname=$_SESSION['add-user-data']['lastname'] ?? null;
$username=$_SESSION['add-user-data']['username'] ?? null;
$email=$_SESSION['add-user-data']['email'] ?? null;
$createpassword=$_SESSION['add-user-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['add-user-data']['confirmpassword'] ?? null;


unset($_SESSION['add-user-data']);


?>


<section class="form__section">
    <div class="container form__section-container">
        <h2>Додати юзера</h2>
               
        <?php if(isset($_SESSION['add-user-success'])): ?>
        
        <div class="alert__message success">
            <p>
                <?=$_SESSION['add-user-success'];
                unset($_SESSION['add-user-success']); 
                ?>
            </p>
        </div>

        
        <?php elseif(isset($_SESSION['add-user'])): ?>
        
        <div class="alert__message error">
            <p>
                <?=$_SESSION['add-user'];
                unset($_SESSION['add-user']); 
                ?>
            </p>
        </div>

        <?php endif ?>


        <form action="<?=ROOT_URL?>admin/add-user-logic.php" enctype="multipart/form-data" method='POST'>
            <input type="text"     name ="firstname"       value ="<?= $firstname?>"  placeholder="Ім'я">
            <input type="text"     name ="lastname"        value ="<?= $lastname?>"  placeholder="Прізвище">
            <input type="username" name ="username"        value ="<?= $username      ?>"  placeholder="Логін">
            <input type="email"    name ="email"           value ="<?= $email          ?>"  placeholder="Email">
            <input type="password" name ="createpassword"  value ="<?= $createpassword ?>"  placeholder="Пароль">
            <input type="password" name ="confirmpassword" value ="<?= $confirmpassword?>"  placeholder="Повторіть пароль">
             <select name='userrole'>

                <option value="0">Користувач</option>
                <option value="1">Адмін</option>

            </select>
            <div class="form__control">
                <label for="avatar">Додайте аватар</label>
                <input type="file" name ='avatar' id="avatar">
            </div>
            <button type="submit" name='submit' class="btn">Додати</button>
        </form>
    </div>
</section>





<?php
include '../component/footer.php';
?>