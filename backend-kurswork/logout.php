<?php
require 'config/settings.php';

session_destroy();

header('location: ' . ROOT_URL);
die();
?>