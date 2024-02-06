
<?php
require '../config.php';

$info = [];

$id = filter_input(INPUT_GET, 'id');
if($id) {

     $sql = $pdo->prepare("SELECT * FROM stock WHERE id = :id");
     $sql->bindValue(':id', $id);
     $sql->execute();

     if($sql->rowCount() > 0) {
      
        $info = $sql->fetch(PDO::FETCH_ASSOC);



     } else{
        header("Location: estoque.php");
     }

}else{
    header("Location: estoque.php");
    exit;
}


?>

<h1>Editar Produto </h1>

<form action="../edit_estoque_action.php" method="post">

<input type="hidden" name="id" value="<?=$info['id'];?>"/>

    
<label>
    Produto:<br/>
    <input type="text" name="product"value="<?=$info['product'];?>">
</label><br/><br/>

<label>
    Código do Produto:<br/>
    <input type="text" name="code" value="<?=$info['code'];?>">
</label><br/><br/>

<label>
    Entrada:<br/>
    <input type="text" name="input"value="<?=$info['input'];?>">
</label><br/><br/>

<label>
    Saída:<br/>
    <input type="text" name="output" value="<?=$info['output'];?>">
</label><br/><br/>

<label>
    Estoque Atual:<br/>
    <input type="text" name="stock" value="<?=$info['stock'];?>">
</label><br/><br/>



<input type="submit" value="Salvar">

</form>