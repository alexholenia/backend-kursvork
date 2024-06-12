<?php
require "config/database.php";

if(!isset($_SESSION['user_is_admin'])){
    header("location: " . ROOT_URL . "logout.php");

    session_destroy();
}
if(isset($_POST['submit'])){

    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);


    if(!$firstname || !$lastname ){
        $_SESSION['edit-user'] = "Неправильне заповнення форми";

    }else{

        $query = "UPDATE users SET firstname='$firstname', lastname='$lastname',is_admin=$is_admin WHERE id= $id LIMIT 1";
        $result = mysqli_query($connection, $query);

        if(mysqli_errno($connection)){
            $_SESSION['edit-user'] = 'Не змінено, помилка.';

        }else{
            $_SESSION['edit-user-success'] = " $firstname $lastname змінено";

        }

    }

}
header("location: " . ROOT_URL . "admin/manage-users.php");
die();
?>