<?php
require 'config.php';

$product = filter_input(INPUT_POST, 'product', FILTER_SANITIZE_SPECIAL_CHARS);
$code = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_SPECIAL_CHARS);


 if($product && $code ) {

   $product = ucwords($product);

   $sql = $pdo->prepare("SELECT * FROM stock WHERE product = :product");
   $sql->bindValue(':product', $product);
   $sql->execute();

  

   if($sql->rowCount() === 0 ) {
   $sql = $pdo->prepare("INSERT INTO stock (product, code) VALUES (:product, :code)");
   $sql->bindValue(':product', $product);
   $sql->bindValue(':code', $code);
   $sql->execute();

   header("Location: pages/estoque.php");
   exit;

  } else {
    header("Location: pages/adicionar_estoque.php");
    exit;
  } 


} else{
    header("Location: pages/adicionar_estoque.php");
    exit;
}

