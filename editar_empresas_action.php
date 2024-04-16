<?php
 require 'config.php';
 require_once 'dao/ProspectionDaoMysql.php';
 
 $prospectionDao = new ProspectionDaoMysql($pdo);

$id = filter_input(INPUT_POST, 'id'); 
$companies = filter_input(INPUT_POST, 'companies');
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$phone = filter_input(INPUT_POST, 'phone');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$notes = filter_input(INPUT_POST, 'notes');
$status = filter_input(INPUT_POST, 'status');




if($id !== null && $companies !== null && $name !== null && $email !== null && $status !== null) {
   
   $p = new Prospection();
   $p->setId($id);
   $p->setCompanies($companies);
   $p->setName($name);
   $p->setPhone($phone);
   $p->setEmail($email);
   $p->setNotes($notes);
   $p->setStatus($status);

  
  
  
   $prospectionDao->update($p);
     header("Location: pages/prospeccao.php");
     exit;

    } else {
     header("Location: pages/contact_edit.php?od=".$id);
     exit;
    } 

