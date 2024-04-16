<?php
require '../config.php';
require_once '../dao/ProspectionDaoMysql.php';

$prospectionDao = new ProspectionDaoMysql($pdo);

$prospectionInfo = false;

$id = filter_input(INPUT_GET, 'id');



if($id) {
    $prospectionInfo = $prospectionDao->findById($id);
    
}

if($prospectionInfo === false ){
  header("Location: prospeccao.php");
   exit;
}
?>

<link rel="stylesheet" href="<?=$base?>assets/css/form.css">


<div class="container">
        
        <h2>Editar Cadastro</h2>


        <form action="../editar_empresas_action.php" method="POST">

        <input type="hidden" name="id" value="<?=$prospectionInfo->getId();?>">

        <div class="input-fields">
            <label>Empresa</label>
            <input type="text" name="companies" id="" placeholder="Nome da Empresa" value="<?=$prospectionInfo->getCompanies();?>"  required >
        </div>

        <div class="input-fields">
            <label>Nome do Decisor</label>
            <input type="text" name="name" id="" placeholder="Nome e Sobrenome" value="<?=$prospectionInfo->getName();?>"  required>
        </div>

                 
  
        <div class="input-fields">
            <label>Telefone</label>
            <input type="text" name="phone" id=""  value="<?=$prospectionInfo->getPhone();?>" placeholder="(xx)9xxxx-xxxx">
        </div>

        <div class="input-fields">
            <label>E-mail do Decisor</label>
            <input type="text" name="email" id="" placeholder="E-mail" value="<?=$prospectionInfo->getEmail();?>" required >
        </div>

       
    
        <div class="input-fields">
        <label>Notas</label>
         <textarea name="notes" id="" cols="30" rows="10" placeholder="Anotações sobre o Cliente"><?=$prospectionInfo->getNotes();?></textarea>
        </div>
        <div class="input-fields">
        <label>Status</label>
        <select name="status">
        <option value="a" <?=($prospectionInfo->getStatus() === 'a') ? 'selected' : '';?>>Conversas em andamento</option>
    <option value="e" <?=($prospectionInfo->getStatus() === 'e') ? 'selected' : '';?>>Contato encerrado</option>
         </select>
        </div>


        <div class="input-fields">
           <input type="submit" value="Atualizar">
        </div>
      

        </form>


    </div><!--container-->

    <br/>










