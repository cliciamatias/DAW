<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $bancodados = "carrinho_js";
    $conexao = new mysqli($servidor, $usuario, $senha, $bancodados);

    // Verifica a conexão
    if ($conexao->connect_error) {
        die("ERRO! Conexão falhou: " . $conexao->connect_error);
    }

    // Executa a consulta SQL para obter os dados do carrinho
    $resultado = $conexao->query("SELECT id, nome, quantidade, valor FROM `carrinho`");

    // Inicializa a soma total
    $soma = 0;

    // Percorre os resultados da consulta e adiciona os itens ao carrinho
    while ($linha = $resultado->fetch_assoc()) {
        // Calcula o subtotal para o item atual
        $linha["subtotal"] = $linha["quantidade"] * $linha["valor"];
        
        // Adiciona o subtotal à soma total
        $soma += $linha["subtotal"];
        
        // Adiciona o item ao carrinho
        $carrinho[] = $linha;
    }
    $conexao->close();

    // retornando os dados do carrinho e o valor total como uma string JSON
    echo json_encode(array("carrinho" => $carrinho, "total" => $soma));
?>
