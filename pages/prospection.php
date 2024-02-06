<?php

require './includes/header.php';


?>

<h2 class="mt-3">Criar Contato</h2>

<form method="post">

    <div class=form-group>
        <label class="mt-3" >Nome da Empresa</label>
        <input type="text" class="form-control" name="company" value="">
    </div>

    <div class=form-group>
        <label class="mt-3" >Nome do contato</label>
        <input type="text" class="form-control" name="name" value="">
    </div>

    <div class=form-group>
        <label class="mt-3" >Telefone do contato</label>
        <input type="text" class="form-control" name="phone" value="">
    </div>

    <div class=form-group>
        <label class="mt-3" >E-mail</label>
        <input type="text" class="form-control" name="email" value="">
    </div>

    <div class=form-group>
        <label class="mt-3">Anotações</label>
        <textarea class="form-control" name="descricao" rows="4"></textarea>
    </div>
    <br/>

    <div class=form-group>
    <select name="opcao" class="form-select" aria-label="Default select example">
      <option selected>status</option>
      <option  value="s">Em Andamento</option>
      <option  value="n">Venda Realizada</option>
      <option  value="s">Encerrado</option>
  
   </select>
    </div>
    <br/>
    

    <div class="form-group">
        <button type="submit"  class="btn btn-success">Cadastrar</button>
    </div>


  </form>
