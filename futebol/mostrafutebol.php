<?php

$servidor = 'localhost';
$banco = 'futebol';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
$comandoSQL = 'SELECT `id`, `nome`, `pontos` FROM `time`';
$comando = $conexao->prepare($comandoSQL);
$resultado = $comando->execute();

if($resultado) {
  echo "Mostrando resultado:<br><br>";
while($linha = $comando->fetch()) {
    echo "Nome do Time: " . $linha['nome'];
    echo "<br>";
    echo "Quantidade de Pontos: " . $linha['pontos'];
    echo "<br>";
    echo "<a href='apagatime.php?id={$linha['id']}'>Apagar</a>";
    echo "<a href='mostra_dados_time.php?id={$linha['id']}'>Editar</a><br><br>";
  }
} else {
  echo "Erro no comando SQL";
}  
        
$conexao = null;

?>