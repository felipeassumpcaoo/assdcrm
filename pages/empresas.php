<?php
require '../config.php';
?>

<link rel="stylesheet" href="<?=$base?>assets/css/form.css">




<div class="container">
        
        <h2>Registro</h2>


        <form action="" method="post">

        <div class="input-fields">
            <label>Empresa</label>
            <input type="text" name="" id="" placeholder="Nome da Empresa">
        </div>

        <div class="input-fields">
            <label>Nome do Decisor</label>
            <input type="text" name="" id="name" placeholder="Nome e Sobrenome">
        </div>

                 
  
        <div class="input-fields">
            <label>Telefone</label>
            <input type="text" name="" id="phone" placeholder="(xx)9xxxx-xxxx">
        </div>

        <div class="input-fields">
            <label>E-mail do Decisor</label>
            <input type="text" name="" id="" placeholder="E-mail">
        </div>

        <div class="input-fields">
            <label>Linkedin</label>
            <input type="text" name="" id="" placeholder="Link da Pagina">
        </div>
       
           
        <div class="input-fields">
        <label>Notas</label>
         <textarea name="" id="" cols="30" rows="10" placeholder="Anotações sobre o Cliente"></textarea>
        </div>

        <div class="input-fields">
        <label>Status</label>
        <select name="status">
            <option value="andamento">Em andamento</option>
            <option value="encerrado">Encerrado</option>
         </select>
        </div>



        <div class="input-fields">
           <input type="button" value="Salvar">
        </div>
      

        </form>


    </div><!--container-->

    <br/>










