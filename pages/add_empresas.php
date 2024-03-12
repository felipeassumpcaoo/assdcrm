<?php
require '../config.php';
?>

<link rel="stylesheet" href="<?=$base?>assets/css/form.css">




<div class="container">
        
        <h2>Cadastro</h2>


        <form action="../addempresas_action.php" method="post">

        <div class="input-fields">
            <label>Empresa</label>
            <input type="text" name="companies" id="" placeholder="Nome da Empresa" required >
        </div>

        <div class="input-fields">
            <label>Nome do Decisor</label>
            <input type="text" name="name" id="" placeholder="Nome e Sobrenome" required>
        </div>

                 

        <div class="input-fields">
            <label>E-mail do Decisor</label>
            <input type="text" name="email" id="" placeholder="E-mail" required >
        </div>




        <div class="input-fields">
        <label>Status</label>
        <select name="status">
            <option value="a">Conversas em andamento</option>
            <option value="e">Contato encerrado</option>
         </select>
        </div>


        <div class="input-fields">
           <input type="submit" value="Cadastrar">
        </div>
      

        </form>


    </div><!--container-->

    <br/>










