<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <style>
        body {
            background: linear-gradient(to right,rgb(17, 54, 71), rgb(20, 147,220), rgb(17, 54, 71));
            color:white;
            font-family: arial;
            padding: 40px;
            text-align: center;
        }
        form {
            font-family: arial, sans-serif;
            text-align: center;
        }
        input {
            border: 2px solid #dddddd;
            background-color: #D6EEEE;
            border-radius: 10px;
            padding: 10px;
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
    <?php
        $id = $_GET['id'];
        //verificando se o índice do aluno a ser editado foi passado pelo GET
        if(isset($_GET['id'])) 
        {
            //abrindo o arquivo de dados dos alunos
            $arqAluno = 'dadosAluno.txt';
            $linha = file($arqAluno);

            //verificando se o índice é válido
            if($id >= 0 && $id < count($linha)) 
            {
                list($aluno, $matricula, $email) = explode(';', $linha[$id]);
            } 
            else 
            {
                header('Location: lerAluno.php'); //redirecionando para a página inical, pois o índice é inválido
            }
        }
        //processando o formulário 
        $info="";
        if($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $novoAluno = $_POST['novoAluno'];
            $novaMatricula = $_POST['novaMatricula'];
            $novoEmail = $_POST['novoEmail'];
            $info = "Aluno atualizado!";

            //atualizando as informações no vetor 'linha'
            $linha[$id] = "$novoAluno;$novaMatricula;$novoEmail\n";

            //função que reescreve no arquivo com as informações atualizadas
            file_put_contents($arqAluno, implode('', $linha));

            //redirecionando de volta para a página principal após editar
            //header('Location: lerAluno.php');
        }
    ?>
    <h1>Editar Aluno</h1>
    <form method="POST">
        <label for="novoAluno">Nome do Aluno:</label>
        <input type="text" name="novoAluno" value="<?php echo $aluno;//exibindo no input a informação original?>"><br> <br>
        
        <label for="novaMatricula">Nova Matrícula:</label>
        <input type="text" name="novaMatricula" value="<?php echo $matricula;?>"><br> <br>
        
        <label for="novoEmail">Novo E-mail:</label>
        <input type="email" name="novoEmail" value="<?php echo $email;?>"><br> <br>

        <input class="botao" type="submit" value="Salvar Alterações"> <br> <br>
        <a href="lerAluno.php">Ver alunos cadastrados</a>
    </form>
    <h2><?php echo $info ?></h2>
</body>
</html>
