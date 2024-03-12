<?php
require '../config.php';


$prospectionList = [];
$sql = $pdo->query("SELECT * FROM prospection");
if($sql->rowCount() > 0 ) {
  $prospectionList = $sql->fetchAll(PDO::FETCH_ASSOC);  
}


?>

<a href="add_empresas.php">Registrar Empresa</a><br/><br>
<table border="1" width="90%">
    <tr>
      
        <th>Empresa</th>
        <th>Nome do Decisor</th>
        <th>E-mail</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>
    <?php foreach($prospectionList as $prospectionLists):?>
        <tr>
          <td><?=$prospectionLists['companies'];?></td>
          <td><?=$prospectionLists['name'];?></td>
          <td><?=$prospectionLists['email'];?></td>
          <td><?=$prospectionLists['status'] == 'a' ? 'Ativo' : 'Inativo' ;?></td>
          <td>
            <a href="contact_edit.php?id=<?=$prospectionLists['id'];?>">[Editar]</a>
            <a href="contact_delete.php?id=<?=$prospectionLists['id'];?>"onclick="return confirm('Tem certeza que deseja excluir?')">[Excluir]</a>
          </td>
        </tr>
    <?php endforeach; ?>
</table>
