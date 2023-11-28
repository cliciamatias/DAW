<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$database = "3daw-prova2";

$conexao = new mysqli($servidor,$usuario,$senha,$database);

if($conexao->connect_error)
{
    die("ERRO! Conexao falhou.");
}

$sql = "SELECT nome, cpf, sala FROM fiscal";

$resultado = $conexao->query($sql);

$fiscal = array();

while($linha = $resultado->fetch_assoc())
{
        $fiscal[] = array("nome" => $linha["nome"], "cpf" => $linha["cpf"], "sala" => $linha["sala"]);
}

$conexao->close();
echo json_encode($fiscal);
?>
