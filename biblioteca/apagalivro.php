<?php
    $id = $_GET['id'];
    $servidor = 'localhost';
    $banco = 'biblioteca';
    $usuario = 'root';
    $senha = '';

    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

    $comandoSQL = "DELETE FROM livro WHERE `livro`.`id` = $id";

    try {
        $resultado = $conexao->exec($comandoSQL);
    
        if($resultado != 0) {
            echo "Item apagado!";
        } else {
            echo "Erro ao apagar o item!";
        }
        } catch (Exception $e) {
        echo "Erro $e";
        }
    ?>

