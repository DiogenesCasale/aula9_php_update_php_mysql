<?php
$servidor = 'localhost';
$banco = 'biblioteca';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
$comandoSQL = 'SELECT `id`, `título`, `idioma`, `qtd_pag`, `editora`, `data_publi`, `isbn` FROM `livro`';
$comando = $conexao->prepare($comandoSQL);
$resultado = $comando->execute();

if($resultado) {
  echo "Mostrando resultado:<br><br>";
  while($linha = $comando->fetch()) {
      echo "Título do Livro: " . $linha['título'];
      echo "<br>";
      echo "Idioma do Livro: " . $linha['idioma'];
      echo "<br>";
      echo "Quantidade de Página: " . $linha['qtd_pag'];
      echo "<br>";
      echo "Editora: " . $linha['editora'];
      echo "<br>";
      echo "Data de Publicação: " . $linha['data_publi'];
      echo "<br>";
      echo "ISBN: " . $linha['isbn'];
      echo "<br>";
      echo "<a href='apagalivro.php?id={$linha['id']}'>Apagar</a>";
      echo "<a href='mostra_dados_livro.php?id={$linha['id']}'>Editarr</a><br><br>";
    }
  } else {
      echo "Erro no comando SQL";
  }    
$conexao = null;
?>


