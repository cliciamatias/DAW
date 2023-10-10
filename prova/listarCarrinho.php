<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>CRUD - Listar produto</title>
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
            background: rgba(0,0,0,0.4);
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 2px solid #dddddd;
            text-align: center;
            padding: 8px;
        }
        tr:hover {
            background-color: #709191;
            color: black;
        }
        a {
            color: white;
        }
        .quant {
            border-radius: 50px;
            width: 40px;
            height: 25px;
        }
        .botao {
            width: 20%;
            height: 40px;
            border-radius: 15px;
            background-color: rgb(17, 54, 71);
            color: white;
        }
    </style>
</head>
<body>
    <h1>Produtos em Estoque</h1>

    <!-- form que passará informações de metodo 'post' através do botão de submit para a página do carrinho-->
    <form action='carrinho.php' method='POST'> 
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Valor (R$)</th>
                <th>Quantidade</th>
            </tr>
            <?php
            $carrinho = fopen("produtos.txt", "r") or die("Erro! Não foi possível abrir o arquivo."); //lendo o arquivo 'produtos.txt'
            
            $i = 0; //inicializando contador da repetição
            while(!feof($carrinho)) //ler cada linha até o final do arquivo
            {
                $linha = fgets($carrinho); //armazenando cada informação do arquivo em 'linha'
                
                $colunaDados = explode(";", $linha); //separando os dados de cada linha em colunas por ';'
                $id = $colunaDados[0];
                $nome = $colunaDados[1];
                $valor = $colunaDados[2];
                //exibindo na tabela as respectivas informações do arquivo
                echo "<tr>";
                echo "<td>" . $id . "</td>";
                echo "<td>" . $nome . "</td>";
                echo "<td>R$ " . $valor . "</td>";
                echo "<td><input class='quant' type='number' name='quantidade[$id]' min='1'></td>"; //solicitando quantidade do respectivo produto através do seu id
                echo "</tr>";
                echo "<input type='hidden' name='id[$id]' value='$id'>"; //criando um campo de entrada oculto (hidden) no formulário para passar os dados para o carrinho através do id do respectivo produto
                echo "<input type='hidden' name='nome[$id]' value='$nome'>";
                echo "<input type='hidden' name='valor[$id]' value='$valor'>";
                $i++; //incrementando o contador para ler cada linha do arquivo
            }
            fclose($carrinho); //fechando o arquivo
            ?>
        </table> <br>

        <input type='submit' class='botao' value='Adicionar ao carrinho'> <!-- Botão para adicionar todos os produtos selecionados -->
        <br>
    </form>

    <a href='carrinho.php'>Ver Carrinho</a>
</body>
</html>
