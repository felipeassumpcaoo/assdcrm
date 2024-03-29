<?php
require 'config.php';
require 'models/Auth.php';

 $name = filter_input(INPUT_POST,  'name');
 $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
 $password = filter_input(INPUT_POST, 'password');

 if ($name && $email && $password) {
 
    $auth = new Auth($pdo, $base);

   
    if($auth->emailExists($email) === false )  {
        
        $auth->registerUser($name, $email, $password);
        header("Location: ".$base);
        exit;



    } else {
        $_SESSION['error'] = 'email já cadastado';
       header("Location: ".$base."login.php");
    }

 }

$_SESSION['error'] = 'email e/ou senha invalidos!';
 header("Location: ".$base."login.php");
 exit;