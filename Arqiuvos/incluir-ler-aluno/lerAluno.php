<?php
        $matricula = "";
		$email = "";
		$aluno = "";
		$info = "";
        $arquivoAlunoIn = fopen("dadosAluno.txt", "r") or die("Erro! Nao foi possivel criar o arquivo.");
        $x = 0;
		$linhas[] = fgets($arquivoAlunoIn);
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        h1 {
            text-align: center;
        }
        table {
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
            background-color: #D6EEEE;
        }
        tr:hover {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
<h1>Alunos Incluídos no Arquivo</h1>
<table class="tabela">
<tr>
    <th>Aluno</th>
    <th>Matricula</th>
    <th>E-mail</th>
</tr>
<?php
while (!feof($arquivoAlunoIn)) 
{
	$linhas[] = fgets($arquivoAlunoIn);
	$colunaDados = explode(";", $linhas[$x]);
	$aluno = $colunaDados[0];
	$matricula = $colunaDados[1];
	$email = $colunaDados[2];
    echo "<tr>";
    echo "<td>" . $aluno . "</td>";
    echo "<td>" . $matricula . "</td>";
    echo "<td>" . $email . "</td>";
    echo "</tr>";
	$x++;
}
fclose($arquivoAlunoIn);
?>
<p><?php echo $info ?></p>
<br>
</body>
</html>