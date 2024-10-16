<?php
$servidor = 'localhost';
$banco = 'biblioteca';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$codigoSQL = "UPDATE `livro` SET `título` = :nm, `idioma` = :idi, `qtd_pag` = :pags, `editora` = :edits, `data_publi` = :dat, `isbn` = :isb WHERE `livro`.`id` = :id";
//UPDATE `produto` SET `nome` = :nm, `url` = :link, `descricao` = :descr, `preco` = :valor WHERE `produto`.`id` = :id

try {
    $comando = $conexao->prepare($codigoSQL);

    //var_dump($_GET);

    $resultado = $comando->execute(array('nm' => $_GET['título'], 'idi' => $_GET['idioma'], 'pags' => $_GET['qtd_pag'], 'edits' => $_GET['editora'], 'dat' => $_GET['data_publi'],'isb' => $_GET['isbn'],'id' => $_GET['id']));

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