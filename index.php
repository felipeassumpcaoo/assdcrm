<?php


 require 'config.php';
 require 'app/Models/Auth.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();


 require 'includes/header.php';
 require 'includes/sidebar.php';
 require 'pages/home.php';
 require 'includes/footer.php';








