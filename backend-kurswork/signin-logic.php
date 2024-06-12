<?php
require "config/database.php";


if(isset($_POST['submit'])){

    $username_email = filter_var($_POST['username_email'] , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var(($_POST['password']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(!$username_email){
        $_SESSION['signin'] = 'Логін або Email не вірні';

    }
    elseif(!$password){
        $_SESSION['signin'] = 'Введіть пароль';
 
    }else{  

        $fetch_user_query = "SELECT * FROM users WHERE username = '$username_email' OR email = '$username_email'";
        $fetch_user_result = mysqli_query($connection, $fetch_user_query);

        if(mysqli_num_rows($fetch_user_result) == 1){

            $user_record=mysqli_fetch_assoc($fetch_user_result);
            $db_password = $user_record['password'];


            if(password_verify($password,$db_password)){


                $_SESSION['user-id'] = $user_record['id'];
                $_SESSION['signin-success'] = "Увійшли";


                if($user_record['is_admin']==1){
                    $_SESSION['user_is_admin'] = true;

                }

                header('location: ' . ROOT_URL . 'admin/index.php');
                
            }else{
                $_SESSION['signin'] = "Перевірте дані!";
            }
        }else{
            $a = mysqli_num_rows($fetch_user_result);
            echo mysqli_num_rows($fetch_user_result);
            $_SESSION['signin'] = "Юзера не знайдено!";
        }
    }


    if(isset($_SESSION['signin'])){
        $_SESSION['signin-data'] = $_POST;
        header('location: ' . ROOT_URL . 'signin.php');
        die();
    }

}else{
    header('location: ' . ROOT_URL . "signin.php");
    die();
}
