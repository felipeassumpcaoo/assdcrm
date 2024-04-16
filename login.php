<?php
 require 'config.php';
 //require 'models/Auth.php';
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$base?>assets/css/login.css">
    <title>Login</title>
</head>
<body>



    <div class="container">
        
        <h2>LOGIN</h2>

        <form id="form" action="<?=$base;?>login_action.php" method="post">
       
           <?php if(!empty($_SESSION['error'])) : ?>
              <?=$_SESSION['error'];?>
              <?=$_SESSION['error'] = ''; ?>
           <?php endif; ?>

            <label>E-mail</label>
            <input type="email" name="email" id="" >
    
            <label>Senha</label>
            <input type="password" name="password" id="password" ><br/>
            
            <a class="showPassword" id= "click" href="">Mostrar senha</a>
            <br/><br/>

           <input type="submit" value="Entrar">



        <a href="<?=$base;?>/reset.php" class="update-password">Esqueceu a senha?</a>
        
      


        </form>
        
    </div><!--container-->

    <br/>

    <script src="<?=$base?>assets/js/script.js"></script>

    
</body>
</html>