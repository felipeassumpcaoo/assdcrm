<?php
 
 require 'config.php';

$id = filter_input(INPUT_POST, 'id'); 
$companies = filter_input(INPUT_POST, 'companies');
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$phone = filter_input(INPUT_POST, 'phone');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$notes = filter_input(INPUT_POST, 'notes');
$status = filter_input(INPUT_POST, 'status');



if( $phone != NULL && $notes != NULL) {
   $companies = ucwords($companies);
        $name = ucwords($name);

     $sql = $pdo->prepare("UPDATE prospection SET companies = :companies, name = :name,
     email = :email, phone = :phone, notes = :notes, status = :status WHERE id = :id");
     $sql->bindValue(':companies', $companies);
     $sql->bindValue(':name', $name);
     $sql->bindValue(':email', $email);
     $sql->bindValue(':phone', $phone);
     $sql->bindValue(':notes', $notes);
     $sql->bindValue(':status', $status);
     $sql->bindValue(':id', $id);
     $sql->execute();

     header("Location: pages/prospeccao.php");
     exit;


    } else {
     header("Location: pages/contact_edit.php");
     exit;
    } 

