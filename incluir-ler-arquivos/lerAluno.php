<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Alunos</title>
    <style>
        body {
            background: linear-gradient(to right,rgb(17, 54, 71), rgb(20, 147,220), rgb(17, 54, 71));
            color: white;
            font-family: arial;
            text-align: center;
        }
        h1 {
            text-align: center;
        }
        table {
            background: rgba(0,0,0,0.2);
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 2px solid #dddddd;
            text-align: center;
            padding: 8px;
        }
        tr:nth-child(even) {
         background-color: rgb(17, 54, 71);
        }
        tr:hover {
            background-color: #709191;
            color: black;
        }
        a {
            color: white;
        }
        .edit {
        color: #7fe566;
        }
        .excluir {
        color: #ff4500;
    }
    </style>
</head>
<body>
    <h1>Alunos Incluídos no Arquivo</h1>
    <table class="tabela">
        <tr>
            <th>n°</th>
            <th>Aluno</th>
            <th>Matricula</th>
            <th>E-mail</th>
            <th>...</th>
        </tr>
        <?php
            $arqAluno = fopen("dadosAluno.txt", "r") or die("Erro! Nao foi possivel criar o arquivo.");//abrindo arquivo para leitura 'r'
            $conteudo[] = fgets($arqAluno);
        
            $i = 0;
            while(!feof($arqAluno)) 
            {
                $conteudo[] = fgets($arqAluno); //vetor 'conteudo' recebendo informações do arquivo 'dadosluno.txt'
                $colunaDados = explode(";", $conteudo[$i]); //separando as informações coletadas, através de colunas da tabela
                $aluno = $colunaDados[0]; 
                $matricula = $colunaDados[1];
                $email = $colunaDados[2];
                //exibindo na tabela as respectivas informações do arquivo
                echo "<tr>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $aluno . "</td>";
                echo "<td>" . $matricula . "</td>";
                echo "<td>" . $email . "</td>";
                echo "<td><a class='edit' href='editarAluno.php?id=$i'>Editar</a> | <a class='excluir' href='excluirAluno.php?id=$i'>Excluir</a></td>";
                //echo "<td></td>";
                echo "</tr>";
                $i++;
            }
            fclose($arqAluno); //fechando o arquivo
        ?>
    </table> <br>
    <a href="incluirAluno.php">Ir cadastrar aluno</a>
</body>
</html>
