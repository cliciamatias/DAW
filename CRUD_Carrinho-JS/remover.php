<?php
if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    $id = $_GET["id"]; // Obtendo o id do produto a ser removido

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $bancodados = "carrinho_js";
    $conexao = new mysqli($servidor, $usuario, $senha, $bancodados); 

    // Verifica se a conexão foi bem-sucedida
    if($conexao->connect_error)
    {
        die("ERRO! Falha na conexao.");
    }

    // Define a consulta SQL para deletar o produto com o id especificado
    $comandoSQL = "DELETE FROM `Produtos` WHERE id = $id";

    // Executa a consulta SQL
    $resultado = $conexao->query($comandoSQL);

    // Fecha a conexão com o banco de dados
    $conexao->close();

    // Codifica o resultado da consulta como uma string JSON e imprime
    $retorno = json_encode($resultado, JSON_UNESCAPED_UNICODE);
    echo $retorno;
}
?>
