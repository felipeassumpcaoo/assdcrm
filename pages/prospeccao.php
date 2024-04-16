<?php
require '../config.php';
require  '../dao/ProspectionDaoMysql.php';
$prospectionDao = new ProspectionDaoMysql($pdo);
$prospectionList = $prospectionDao->findAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?=$base?>assets/css/prospeccao.css">
  <title>Prospecção - Lista</title>
</head>
<body>






 <div class="container">

 <button><a href="add_empresas.php"><h3>Adicionar Empresa</h3></a></button><br/>


  
 <table>

<thead>
    <th>Empresa</th>
    <th>Nome do Decisor</th>
    <th>E-mail</th>
    <th>Status</th>
    <th>Ações</th>
</thead>
<?php foreach($prospectionList as $prospectionLists):?>
  
  <tbody>
    <tr>
        <td data-th="Empresa"><?=$prospectionLists->getCompanies();?></td>
        <td data-th="Nome do Decisor"><?=$prospectionLists->getName();?></td>
        <td data-th="E-mail"><?=$prospectionLists->getEmail();?></td>
        <td data-th="Ações"><?=$prospectionLists->getStatus() == 'a' ? 'Conversas em andamento' : 'Contato encerrado' ;?></td>
        <td>
          <a class="edit-icon" href="contact_edit.php?id=<?=$prospectionLists->getId();?>">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
        </svg>
        </a>

          <a class="delete-icon" href="contact_delete.php?id=<?=$prospectionLists->getId()?> "onclick="return confirm('Tem certeza que deseja excluir?')"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
</svg>
</a>

</td>
    </tr>
 </tbody>
<?php endforeach; ?>
</table>
 </div><!--container-->

   

  
</body>
</html>


