<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$database = "3daw-prova";

$conexao = new mysqli($servidor,$usuario,$senha,$database);
id
// verificando a conexão
if($conexao->connect_error)
{
    // Se a conexão falhar, termina a execução do script
    die("ERRO! Conexao falhou.");
}

$sql = "SELECT nome, cpf, identidade, email, cargo, sala FROM candidatos";

$resultado = $conexao->query($sql);

$candidatos = array();

while($linha = $resultado->fetch_assoc())
{
    //Adicionando cada produto ao array
        $candidatos[] = array("nome" => $linha["nome"], "cpf" => $linha["cpf"], "identidade" => $linha["identidade"], "email" => $linha["email"], "cargo" => $linha["cargo"], "sala" => $linha["sala"]);
}

$conexao->close();
echo json_encode($candidatos);
?>
