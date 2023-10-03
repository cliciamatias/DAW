<!DOCTYPE html>
<html>
<head>
    <title>Mercadinho - DAW</title>
    <style>
         table{
            border: 2px solid #dddddd;
            text-align: center;
            padding: 8px;
        }
    </style>
</head>
<body>
    <section>
        <h2>Produtos em estoque:</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Valor</th>              
            </tr>
            <tr>
                <td>123</td>
                <td>Brócolis</td>
                <td>4,99</td>
                <td>
                    <input type="number" name="quantidade">
                    <input type="submit" value="Adicionar ao carrinho">
                </td>
            </tr>

            <tr>
                <td>234</td>
                <td>Banana</td>
                <td>5,99</td>
                <td>
                    <input type="number" name="quantidade">
                    <input type="submit" value="Adicionar ao carrinho">
                </td>
            </tr>

            <tr>
                <td>345</td>
                <td>Laranja</td>
                <td>3,89</td>
                <td>
                    <input type="number" name="quantidade">
                    <input type="submit" value="Adicionar ao carrinho">
                </td>
            </tr>

            <tr>
                <td>456</td>
                <td>Batata</td>
                <td>4,98</td>
                <td>
                    <input type="number" name="quantidade" <?php $i?>>
                    <input type="submit" value="Adicionar ao carrinho">
                </td>
            </tr>
            <tr>
                <td>567</td>
                <td>Beterrada</td>
                <td>3,98</td>
                <td>
                    <input type="number" name="quantidade">
                    <input type="submit" value="Adicionar ao carrinho">
                </td>
            </tr>
            <tr>
                <td>678</td>
                <td>Limão</td>
                <td>3,63</td>
                <td>
                    <input type="number" name="quantidade">
                    <input type="submit" value="Adicionar ao carrinho">
                </td>
            </tr>
            <tr>
                <td>789</td>
                <td>Maçã</td>
                <td>6,98</td>
                <td>
                    <input type="number" name="quantidade">
                    <input type="submit" value="Adicionar ao carrinho">
                </td>
            </tr>
        </table>
    </section>
    <a href="incluirCarrinho.php">Adicionar produto</a>
</body>
</html>
