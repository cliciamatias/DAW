<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>CRUD- Listar produto</title>
     <style>
         table{
            border: 2px solid #dddddd;
            text-align: center;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h1>CRUD - Listar produtos</h1>
 
    <!-- Criando a tabela -->
    <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Valor (R$)</th>
                <th>Opção</th>
            </tr>
    <?php
        $id = "";
        $nome = "";
        $quantidade = "";
        $valor = "";

        //abrindo o arquivo em formato leitura
        $arqCarrinho = fopen("produtos.txt", "r") or die("Erro ao abrir arquivo!");

        //inicializando contador
        $i = 1;

        $lista[] = file("$arqCarrinho");

        while(!feof($arqCarrinho)) 
        {
            //separando os dados da linha pelo ponto e vírgula
            $colunaDados = explode(";", $lista[$i]);

            $id = $colunaDados[0];
            $nome = $colunaDados[1];
            $quantidade = $colunaDados[2];
            $valor = $colunaDados[3];
            $total = 0; 

            //exibindo a linha como tabela no HTML
            echo "<tr>";
            echo "<td>". $id . "</td>";
            echo "<td>". $nome . "</td>";
            echo "<td>". $quantidade . "</td>";
            echo "<td>". $valor . "</td>";
            echo "<td><a href='remover.php'>Remover</a></td>"; //remover.php será criado ainda
            echo "<tr>";
            $i++;
            break;
            //'totalProduto' calculando o valor da compra do produto, de acordo com a quantidade escolhida 
            $totalProduto = $valor * $quantidade;

            //'somaValor' somando o total de cada produto
            $somaValor += $totalProduto;

            //'totalCompra' somando todos os produtos e listados
            $totalCompra += $somaValor;
        }

        //fechando o arquivo
        fclose($arqCarrinho);
        ?>
        </table>

        <h2>Valor total da compra: <?php echo "R$ $totalCompra";?></h2>
        <a href="incluirCarrinho.php">Continuar comprando</a>
</body>
</html>
