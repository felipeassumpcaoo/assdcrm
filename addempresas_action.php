<?php
 
 require 'config.php';

$companies = filter_input(INPUT_POST, 'companies');
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$status = filter_input(INPUT_POST, 'status');


try {
    if ($companies && $name && $email && $status) {
        $companies = ucwords($companies);
        $name = ucwords($name);

        //Verificando duplicidade
        $sql = $pdo->prepare("SELECT * FROM prospection WHERE email = :email OR companies = :companies");
        $sql->bindValue(':email', $email);
        $sql->bindValue(':companies', $companies);
        $sql->execute();

        if ($sql->rowCount() === 0) {
            $sql = $pdo->prepare("INSERT INTO prospection (companies, name, email, status) VALUES (:companies, :name, :email, :status)");
            $sql->bindValue(':companies', $companies);
            $sql->bindValue(':name', $name);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':status', $status);
            $sql->execute();

            header("Location: pages/prospeccao.php");
            exit;
        } else {
            echo "Já existe um cadastro com o mesmo e-mail, ou empresa";
        }
    } else {
       
        header("Location: pages/add_empresas.php");
    }
} catch (Exception $e) {
    
    echo "Ocorreu um erro: " . $e->getMessage();
    exit;
}


