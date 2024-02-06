<?php
require 'config.php';

if(isset($_POST['id']) && isset($_POST['product']) && isset($_POST['code']) && isset($_POST['input'])
&& isset($_POST['output']) && ($_POST['stock']));

$id = filter_input(INPUT_POST, 'id');
$product = filter_input(INPUT_POST, 'product', FILTER_SANITIZE_SPECIAL_CHARS);
$code = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_SPECIAL_CHARS);
$input = filter_input(INPUT_POST, 'input',  FILTER_SANITIZE_SPECIAL_CHARS);
$output = filter_input(INPUT_POST, 'output',  FILTER_SANITIZE_SPECIAL_CHARS);
$stock = filter_input(INPUT_POST, 'stock',  FILTER_SANITIZE_SPECIAL_CHARS);


if($input !== '' && $output !== '' && $stock !== '') {

   $product = ucwords($product);

   $sql = $pdo->prepare("UPDATE stock SET product = :product, code = :code, input = :input, output = :output,
   stock = :stock WHERE id = :id");
   $sql->bindValue(':id', $id);
   $sql->bindValue(':product', $product);
   $sql->bindValue(':code', $code);
   $sql->bindValue(':input', $input);
   $sql->bindValue(':output', $output);
   $sql->bindValue(':stock', $stock);
   $sql->execute();
    
   header("Location: pages/estoque.php");
   exit;

} else{
   header("Location: pages/adicionar_estoque.php");
  exit;
   
}

