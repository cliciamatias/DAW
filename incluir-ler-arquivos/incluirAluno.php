<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incluir Aluno</title>
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
        $info = "";
        if($_SERVER['REQUEST_METHOD'] == 'POST')  
        {
            //criando as variáveis
            $aluno = $_POST["aluno"];
            $matricula = $_POST["matricula"];
            $email = $_POST["email"];
            $info = "Aluno cadastrado!";
            
            $arqAluno = fopen('dadosAluno.txt',"a+") or die("Erro! Nao foi possivel criar o arquivo."); //criando o arquivo
            $linha = "$aluno;$matricula;$email\n"; 
            $linha = $aluno . ";" . $matricula . ";" . $email . "\n"; //criando linhas do arquivo
            fwrite($arqAluno,$linha); //escrevendo no arquivo
            fclose($arqAluno); //fechando o arquivo
        }
    ?>
    <h1>Dados do Aluno</h1> <br>
    <form action="incluirAluno.php" method="POST">
        <label for="aluno">Nome Aluno:</label>
        <input type="text" name="aluno"> <br><br>

        <label for="matricula">Matrícula:</label>
        <input type="text" name="matricula"> <br><br>
        
        <label for="email">E-mail:</label>
        <input type="email" name="email"> <br><br>

        <input class="botao" type="submit" value="Cadastrar Aluno"> <br> <br>
        <a href="lerAluno.php">Ver alunos cadastrados</a>
    </form>
    <h2><?php echo $info ?></h2>
<br>
</body>
</html>
