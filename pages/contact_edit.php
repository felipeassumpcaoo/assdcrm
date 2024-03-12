<?php
 
 require '../config.php';

$info_prospection = [];
$id = filter_input(INPUT_GET, 'id');
 if($id) {
   $sql = $pdo->prepare("SELECT * FROM prospection WHERE id = :id");
   $sql->bindValue("id", $id);
   $sql->execute();

  if($sql->rowCount() > 0 ) {
    $info_prospection = $sql->fetch(PDO::FETCH_ASSOC);

  } else {
    header("Location: prospeccao.php");
    exit;
  }


} else {
    header("Location: prospeccao.php");
    exit;
}


?>

<link rel="stylesheet" href="<?=$base?>assets/css/form.css">




<div class="container">
        
        <h2>Editar Cadastro</h2>


        <form action="../editar_empresas_action.php" method="post">

        <input type="hidden" name="id" value="<?=$info_prospection['id'];?>">

        <div class="input-fields">
            <label>Empresa</label>
            <input type="text" name="companies" id="" placeholder="Nome da Empresa" value="<?=$info_prospection['companies'];?>"  required >
        </div>

        <div class="input-fields">
            <label>Nome do Decisor</label>
            <input type="text" name="name" id="" placeholder="Nome e Sobrenome" value="<?=$info_prospection['name'];?>"  required>
        </div>

                 
  
        <div class="input-fields">
            <label>Telefone</label>
            <input type="text" name="phone" id=""  value="<?=$info_prospection['phone'];?>"placeholder="(xx)9xxxx-xxxx">
        </div>

        <div class="input-fields">
            <label>E-mail do Decisor</label>
            <input type="text" name="email" id="" placeholder="E-mail" value="<?=$info_prospection['email'];?>" required >
        </div>

       
    
        <div class="input-fields">
        <label>Notas</label>
         <textarea name="notes" id="" cols="30" rows="10" placeholder="Anotações sobre o Cliente"><?=$info_prospection['notes'];?></textarea>
        </div>
        <div class="input-fields">
        <label>Status</label>
        <select name="status" >
            <option value="a">Conversas em andamento</option>
            <option value="e">Contato encerrado</option>
         </select>
        </div>


        <div class="input-fields">
           <input type="submit" value="Atualizar">
        </div>
      

        </form>


    </div><!--container-->

    <br/>










