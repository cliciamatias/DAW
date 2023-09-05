<?php
    $info = "";
    if($_SERVER['REQUEST_METHOD'] == 'POST')  
    {
        $aluno = $_POST["aluno"];
        $matricula = $_POST["matricula"];
        $email = $_POST["email"];
        $info = "";

        echo "Aluno: " . $aluno . " ; Matricula: " . $matricula . " ; E-mail: " . $email;

        $arqAluno = fopen("DadosAluno.txt","a") or die("Erro! Nao foi possivel criar o arquivo.");
        $linha = $aluno . ";" . $matricula . ";" . $email . "\n";
        fwrite($arqAluno,$linha);
        fclose($arqAluno);
        $info = "Aluno cadastrado!";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dados Aluno</title>
    <style>
         h1 {
            text-align: center;
        }
        form {
            font-family: arial, sans-serif;
            text-align: center;
        }
        input {
            border: 2px solid #dddddd;
            border-radius: 10px;
            padding: 10px;
            width: 60%;
        }
        input:nth-child(even) {
            background-color: #D6EEEE;
        }
        input:hover {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
<h1>Dados do Aluno</h1>
<form action="lerAluno.php" method="POST">
    <label for="aluno">Nome:</label>
    <input type="text" name="aluno"> <br><br>

    <label for="matricula">Matrícula:</label>
    <input type="text" name="matricula"> <br><br>
    
    <label for="email">E-mail:</label>
    <input type="text" name="email"> <br><br>

    <input type="submit" value="Cadastrar Aluno">
</form>
<p><?php echo $info ?></p>
<br>
</body>
</html>
