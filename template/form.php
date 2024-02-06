
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Criar Contato</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$base;?>/assets/css/form.css" />
  
</head>
<body>
    
</body>
</html>


<form  method="post">

            <h2>Criar Contato</h2>

            <div class="input-fields">
                <label for="">Nome da Empresa</label>
                <input type="text" placeholder="Empresa" autocomplete="on">
            </div>

            <div class="input-fields">
                <label for="">Nome do Contato</label>
                <input type="text" placeholder="Contato" autocomplete="on">
            </div>

            <div class="input-fields">
                <label for="">Cargo do Contato</label>
                <input type="text" placeholder="Cargo" autocomplete="on">
            </div>

            <div class="input-fields">
                <label for="">Telefone</label>
                <input type="text" placeholder="Telefone" autocomplete="on">
            </div>

            <div class="input-fields">
                <label for="">E-mail</label>
                <input type="text" placeholder="E-mail" autocomplete="on">
            </div>


            <div class="input-fields">
                <label>Anotações</label>
                <textarea name="notes" placeholder="Necessidades e Interesses" id="" cols="30" rows="10"></textarea>
           </div>
          

            <div class="input-fields">
                <label>Status</label>
                    <select name="status" id="">
                        <option value="a">Em andamento</option>
                        <option value="v">Venda Realizada</option>
                        <option value="e">Encerrado</option>
                    </select>
            </div>

            <div class="input-fields">
                <label for="">Próximo contato</label>
                <input type="text" placeholder="00/00/0000 - 00:00" autocomplete="on">
            </div>

        
            
            <div class="input-fields">
                <input type="submit" value="criar">
           </div>

</form>


