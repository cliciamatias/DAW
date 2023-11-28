<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Editar Sala</title>
</head>
<body>
    <?php
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $database = "3daw-prova-alterar";

        $conexao = new mysqli($servidor,$usuario,$senha,$database);

        if($conexao->connect_error)
        {
            die("ERRO! Conexao falhou.");
        }

        $sql = "UPDATE sala FROM ´candidatos´";

        $info="";
        if($_SERVER['REQUEST_METHOD'] == 'GET') 
        {
            $nome = $_GET['nome'];
            $novaSala = $_GET['novaSala'];
            $info = "Sala do candidato atualizada!";

            $resultado = $conexao->query($sql);

            $conexao->close();
            echo json_encode($candidatos);
        }
    ?>
    <h1>Editar sala do Candidato</h1>
    <form method="GET">
        <label for="aluno">Nome:</label>
        <input type="text" name="nome" value="<?php echo $nome;//exibindo no input a informação original?>"><br> <br>
       
        <label for="novoSala">Sala:</label>
        <input type="number" name="novaSala" value="<?php echo $sala;?>"><br> <br>

        <input type="submit" value="Salvar Alterações"> <br> <br>
        <a href="listarCandidatos.html">Ver Candidatos</a>
    </form>
    <h2><?php echo $info ?></h2>
</body>
</html>
