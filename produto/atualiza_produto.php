<?php
$servidor = 'localhost';
$banco = 'produto';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$codigoSQL = "UPDATE `produto` SET `nome` = :nm, `url` = :link, `descricao` = :descr, `preco` = :valor WHERE `produto`.`id` = :id";
//"UPDATE `time` SET `nome` = :nm , `pontos` = :qtd WHERE `time`.`id` = :id";
try {
    $comando = $conexao->prepare($codigoSQL);

    $resultado = $comando->execute(array('nm' => $_GET['nome'], 'link' => $_GET['url'], 'descr' => $_GET['descricao'], 'valor' => $_GET['preco'], 'id' => $_GET['id']));

    if($resultado) {
	echo "Comando executado!";
    } else {
	echo "Erro ao executar o comando!";
    }
} catch (Exception $e) {
    echo "Erro $e";
}

$conexao = null;

?>  