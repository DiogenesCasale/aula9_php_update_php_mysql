<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrando dados</title>
</head>
<body>
    <?php
$servidor = 'localhost';
$banco = 'produto';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$id = $_GET['id'];
$comandoSQL = "SELECT `nome`, `url`, `descricao`, `preco` FROM `produto` WHERE `id` = $id";

$comando = $conexao->prepare($comandoSQL);
$resultado = $comando->execute();

if($resultado) {
    if($linha = $comando->fetch()) {
?>
<form action="atualiza_produto.php">
	<label for="nome">Nome:</label>
<?php echo "<input type='text' name='nome' value='{$linha['nome']}'><br>"; ?>
	<label for="quantidade">Url:</label>
<?php echo "<input type='text' name='url' value='{$linha['url']}'><br>"; ?>
    <label for="quantidade">Descrição:</label>
<?php echo "<input type='text' name='descricao' value='{$linha['descricao']}'><br>"; ?>
    <label for="quantidade">Preço:</label>
<?php 
    echo "<input type='text' name='preco' value='{$linha['preco']}'><br>"; 
    echo "<input type='hidden' name='id' value=$id>";
?>
	<input type="submit">
    </form>
<?php
    }
} else {
    echo "Erro no comando SQL";
}
    ?>    
</body>
</html>  