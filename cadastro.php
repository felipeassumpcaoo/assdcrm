<?php
 require 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$base?>assets/css/register.css">
    <title>Login</title>
</head>
<body>



    <div class="container">
        
        <h2>Cadastro</h2>

        <form action="<?=$base;?>register_action.php" method="post">

           <label>Nome</label>
            <input type="text" name="name" id="" >
       
            <label>E-mail</label>
            <input type="email" name="email" id="" >
    
            <label>Senha</label>
            <input type="password" name="password" id="" > 
            
           <input type="submit" value="Cadastrar">
           
        </form>
        
    </div><!--container-->

    <br/>

    
</body>
</html>