<?php
require '../config.php';


$list = [];
$sql = $pdo->query("SELECT * FROM stock");
if($sql->rowCount() > 0 ) {
  $list = $sql->fetchAll(PDO::FETCH_ASSOC);  
}

?>

<a href="adicionar_estoque.php">Adicionar Produto</a>

<table border="1" width="100%">
    <tr>
      
        <th>Produto</th>
        <th>Código do Produto</th>
        <th>Entrada</th>
        <th>Saída</th>
        <th>Estoque</th>
        <th>Ações</th>
    </tr>
    <?php foreach($list as $catalog):?>
        <tr>
          <td><?=$catalog['product'];?></td>
          <td><?=$catalog['code'];?></td>
          <td><?=$catalog['input'];?></td>
          <td><?=$catalog['output'];?></td>
          <td><?=$catalog['stock'];?></td>
          <td>
            <a href="edit.php?id=<?=$catalog['id'];?>">[Editar]</a>
            <a href="delete.php?id=<?=$catalog['id'];?>"onclick="return confirm('Tem certeza que deseja excluir?')">[Excluir]</a>
          </td>
        </tr>
    <?php endforeach; ?>
</table>

