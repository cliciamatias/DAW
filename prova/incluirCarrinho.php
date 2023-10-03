<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>CRUD - Adicionar Carrinho</title>
    <style>
         body{
            text-align: center;
        }
         form{
            border: 2px solid #dddddd;
            text-align: center;
            padding: 8px;
        }
    </style>
</head>
<body>
  <h1>Adicionar Produto</h1>
    <form action="incluirCarrinho.php" method="POST">  
        <label for="id">ID do Produto:</label>
        <input type="text" name="id"> <br>

        <label for="nome">Nome do Produto:</label>
        <input type="text" name="nome"> <br>

        <label for="quantidade">Quantidade do produto:</label>
        <input type="number" name="quantidade"> <br>

        <label for="quantidade">Valor do produto (R$):</label>
        <input type="text" name="valor" required> <br>

        <input type="submit" value="Adicionar ao Carrinho">
    </form>

  <?php
    //verificando se teve requisição por POST...
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //Armazenando os valores inseridos no formulário em variáveis
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];

        //Montando a linha a ser inserida no arquivo de texto
        $texto = $id . ";" . $nome . ";" . $quantidade . ";" . $valor . "\n";

        //Se o arquivo não existir...
        if(!file_exists("produtos.txt")) 
        {
            //criando o arquivo
            $arqCarrinho = fopen("produtos.txt", "w");

            //Montando a organização das colunas
            $conteudo = "nome;id;quantidade;valor";

            //Escrevendo no arquivo
            fwrite($arqCarrinho, $texto);
        } 
        //senão, se o prouto já existir...
        else 
        {
            //abrir o arquivo
            $arqCarrinho = fopen("produtos.txt", "a");

            //escrever no arquivo
            fwrite($arqCarrinho, $texto);
        }
        //fechando o arquivo
        fclose($arqCarrinho);

        echo "Produto adicionado ao carrinho!";
    }
?>
<a href="listarCarrinho.php">Ver carrinho</a>
</body>
</html>
