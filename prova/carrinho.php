<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Carrinho de Compras</title>
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
        .excluir {
        background-color: #ff4500;
    }
    </style>
</head>
<body>
    <h1>CRUD - Carrinho de Compras</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Quantidade</th>
            <th>Valor (R$)</th>
            <th>Subtotal (R$)</th>
            <th>...</th>
        </tr>
        <?php
        //inicializando o valor total de compras, que será acumulado na repetição foreach
        $totalCompra = 0;
        //verificando se teve requisição por POST
        if($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            //percorrendo os elementos de cada 'id' dos produtos e atribuindo à 'produtoId' em cada iteração
            foreach($_POST["id"] as $produtoId) 
            {
                //verificando se os índices necessários existem antes de acessá-los, para identificar o produto adicionado
                if(isset($_POST["quantidade"][$produtoId]) && isset($_POST["nome"][$produtoId]) && isset($_POST["valor"][$produtoId])) 
                {
                    //recebendo respectivas variáveis dos produtos
                    $produtoNome = $_POST["nome"][$produtoId];
                    $produtoValor = $_POST["valor"][$produtoId];
                    $quantidade = $_POST["quantidade"][$produtoId]; //'quantidade' recebendo a quantidade determinada para o respectivo produto da iteração

                    //verificando se a quantidade é maior que 0 para eixibir apenas os com qunatidade superior
                    if ($quantidade <= 0) 
                    {
                        continue; //ignorando produtos com quantidade inferior a 1
                    }  
                    $subtotal = $produtoValor * $quantidade; //calculando o subtotal do produto
                    $totalCompra += $subtotal; //atualizando 'totalCompra' somando o subtotal de cada produto

                    echo "<tr>";
                    echo "<td>" . $produtoId . "</td>";
                    echo "<td>" . $produtoNome . "</td>";
                    echo "<td>" . $quantidade . "</td>";
                    echo "<td>R$ " . number_format($produtoValor, 2) . "</td>";
                    echo "<td>R$ " . number_format($subtotal, 2) . "</td>";
                    echo "<td><button class='excluir'><a href='excluir.php?id=$produtoId'>Excluir</a></button></td>"; //identiifcando o produto a ser removido através do seu 'id'
                    echo "</tr>";
                }
            }
        }
        ?>
    </table>
    <h2 style='background-color:green;'>Total da Compra: R$ <?php echo number_format($totalCompra, 2); ?></h2>
    <br>
    <a href="listarCarrinho.php">Voltar</a>
</body>
</html>
