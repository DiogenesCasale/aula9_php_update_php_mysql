<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<?php
$servidor = 'localhost';
$banco = 'produto';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);


$comandoSQL = 'SELECT `id`, `nome`, `url`, `descricao`, `preco` FROM `produto`';
$comando = $conexao->prepare($comandoSQL);

 class produto{
    public $id;
    public $nome;
    public $url;
    public $descricao;
    public $preco;
    public $imagem;

    public function __construct($id, $nome, $url, $descricao, $preco) {
        $this->id = $id;
        $this->nome = $nome;
        $this->url = $url;
        $this->descricao = $descricao;
        $this->preco = (float) $preco;
        $this->imagem = 'https://cloudfront-us-east-1.images.arcpublishing.com/estadao/BSRFGPQARVI7ZHFPKHOT4RBE54.jpg';;
        
        }

    public function exibirInformacoes() {
        echo <<<EOD
        <div class="row justify-content-center">
        <div class="col-md-2">
        <div class="card ml-3 mr-3 mt-3 text-center">
          <div class="card-body">
          <img src="{$this->imagem}" class="card-img-top" height="200px">
            <h5 class="card-title">{$this->nome}</h5>
            <p class="card-text">{$this->descricao}</p>
            <div class="text-sm font-light text-center">A partir de:</div>
            <h3 class="text-sm font-light text-center"> R$ {$this->preco}</h3>
            <div class="text-sm font-light text-center">À vista</div>
            <a href="{$this->url}" target="_blank" class="btn btn-primary">Pegar Promoção</a>
            <a href='apagaproduto.php?id={$this->id}' class="btn btn-primary">Apagar</a>
            <a href='mostra_dados_produtos.php?id={$this->id}' class="btn btn-primary">Editar</a><br><br>
        </div>
        </div>
        </div>
        </div> 
        EOD;
}

}
$resultado = $comando->execute();

if($resultado) {
    echo "Mostrando resultado:<br><br>";
while ($linha = $comando->fetch()) {
    
    $produto = new Produto ($linha['id'], $linha['nome'], $linha['url'], $linha['descricao'], $linha['preco']);

    echo $produto->exibirInformacoes();
    }
} else {
    echo "Erro no comando SQL";
  }  
        
$conexao = null;
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>