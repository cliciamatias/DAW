<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$database = "3daw-prova1";

$conexao = new mysqli($servidor,$usuario,$senha,$database);

// verificando a conexão
if($conexao->connect_error)
{
    // se a conexão falhar, termina a execução do script
    die("ERRO! Conexao falhou.");
}

$sql = "SELECT nome, cpf, sala FROM fiscal";

$resultado = $conexao->query($sql);

$conexao->close();
echo json_encode($fiscal);
?>
