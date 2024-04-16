<?php
 require '../config.php';
 require '../dao/ProspectionDaoMysql.php';

 $prospectionDao = new ProspectionDaoMysql($pdo);
 $id = filter_input(INPUT_GET, 'id');

 if($id) {
   $prospectionDao->delete($id);
 
} 

header("Location: prospeccao.php");
  exit;

?>