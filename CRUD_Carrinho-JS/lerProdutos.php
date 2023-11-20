<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $bancodados = "carrinho_js";
    $conexao = new mysqli($servidor,$usuario,$senha,$bancodados);

    // Verifica se a conexão foi bem-sucedida
    if($conexao->connect_error)
    {
       die("ERRO! Falha na conexao.");
    }
    // Define a consulta SQL para buscar todos os produtos
    $comandoSQL = "SELECT * from `Produtos`";

    $resultado = $conexao->query($comandoSQL);

    $linhaProdutos[] = array();

    $i = 0;
    while($linha = $resultado->fetch_assoc())
    {
        // Adiciona cada linha de resultado ao vetor de produtos
        $linhaProdutos[$i] = $linha;
        $i++;
    }
    $conexao->close();

    // Verifica se a consulta foi bem-sucedida
    if($resultado=true)
    {
        // Se a consulta foi bem-sucedida, codifica o vetor de produtos como uma string JSON
        $retorno = json_encode($linhaProdutos);
    }
    else 
    {
        // Se a consulta falhou, retorna uma mensagem de erro
        $retorno = json_encode("ERRO!");
    }
    // Imprime a string JSON
    echo $retorno;
?>
