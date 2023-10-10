<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>CRUD - Adicionar Carrinho</title>
    <style>
        body {
            background: linear-gradient(to right,rgb(17, 54, 71), rgb(20, 147,220), rgb(17, 54, 71));
            color:white;
            font-family: arial;
            padding: 40px;
            text-align: center;
        }
        h1 {
            text-align: center;
        }
        form {
            font-family: arial, sans-serif;
        }
        input {
            border: 2px solid #dddddd;
            background-color: #D6EEEE;
            border-radius: 10px;
            padding: 10px;
            margin: 7px;
            width: 40%;
        }
        input:hover {
            background-color: #dddddd;
            color: black;
        }
        .botao {
            width: 20%;
            background-color: rgb(17, 54, 71);
            color: white;
        }
        a {
            color: white;
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

        <label for="quantidade">Valor do produto:</label>
        <input type="text" name="quantidade"> <br>

        <input class="botao" type="submit" value="Adicionar ao Carrinho">
    </form>

  <?php
    //verificando se teve requisição por POST
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
            $carrinho = fopen("produtos.txt", "w");

            //Montando a organização das colunas
            $conteudo = "nome;id;quantidade;valor";

            //Escrevendo no arquivo
            fwrite($carrinho, $texto);
        } 
        //senão, se o prouto já existir...
        else 
        {
            //abrir o arquivo
            $carrinho = fopen("produtos.txt", "a");

            //escrever no arquivo
            fwrite($carrinho, $texto);
        }
        //fechando o arquivo
        fclose($carrinho);

        echo "Produto adicionado ao estoque!";
    }
?>
<a href="listarCarrinho.php">Ver Produtos</a>
</body>
</html>