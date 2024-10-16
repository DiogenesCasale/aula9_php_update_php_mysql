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
$banco = 'biblioteca';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$id = $_GET['id'];
$comandoSQL = "SELECT `título`, `idioma`, `qtd_pag`, `editora`, `data_publi`, `isbn` FROM `livro` WHERE `id` = $id";

$comando = $conexao->prepare($comandoSQL);
$resultado = $comando->execute();

if($resultado) {
    if($linha = $comando->fetch()) {
?>
<form action="atualiza_produto.php">
	<label for="nome">Título:</label>
<?php echo "<input type='text' name='título' value='{$linha['título']}'><br>"; ?>
	<label for="quantidade">Idioma:</label>
<?php echo "<input type='text' name='idioma' value='{$linha['idioma']}'><br>"; ?>
    <label for="quantidade">Quantidade de Páginas:</label>
<?php echo "<input type='text' name='qtd_pag' value='{$linha['qtd_pag']}'><br>"; ?>
    <label for="quantidade">Editora:</label>
<?php echo "<input type='text' name='editora' value='{$linha['editora']}'><br>"; ?>
    <label for="quantidade">Data de Publicação:</label>
<?php echo "<input type='date' name='data_publi' value='{$linha['data_publi']}'><br>"; ?>
    <label for="quantidade">Data de Publicação:</label>
<?php 
    echo "<input type='text' name='isbn' value='{$linha['isbn']}'><br>"; 
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