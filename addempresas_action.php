<?php
 
 require 'config.php';
 require  'dao/ProspectionDaoMysql.php';

$prospectionDao = new ProspectionDaoMysql($pdo);

$companies = filter_input(INPUT_POST, 'companies');
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$status = filter_input(INPUT_POST, 'status');


try {
    if ($companies && $name && $email && $status) {
        
        
      if($prospectionDao->verification($email, $companies) === false) {
         $newProspection = new Prospection();
         $newProspection->setCompanies($companies);
         $newProspection->setName($name);
         $newProspection->setEmail($email);
         $newProspection->setStatus($status);

         $prospectionDao->add($newProspection);

         header("Location: pages/prospeccao.php");
         exit;
     
       } else {
        header("Location: pages/add_empresas.php");
         exit;
       } 
       
    }
} catch (Exception $e) {
    
    echo "Ocorreu um erro: " . $e->getMessage();
    exit;
}


