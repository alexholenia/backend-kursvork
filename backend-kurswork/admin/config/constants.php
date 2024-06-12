<?php
session_start();
define("ROOT_URL", "http://backend-kurswork/");
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'travel');
if (!isset($_SESSION['user-id'])) {
    header("location: " . ROOT_URL . "logout.php");
    session_destroy();
    die();
    header("location: " . ROOT_URL . "signin.php");
}