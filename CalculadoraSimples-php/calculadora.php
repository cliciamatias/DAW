<?php

$num1 = 0;
$num2 = 0;
$resultado = 'somar';

if(isset($_GET['num1'], $_GET['num2'], $_GET['calcular']))
{
    $num1 = $_GET["num1"];
    $num2 = $_GET ["num2"] ;
    $calcular = $_GET['calcular'];
    switch($calcular)
    {
        case '+';
            $resultado = ($num1 + $num2);
            break;

        case '-';
            $resultado = ($num1 - $num2);        
            break;

        case '*';
            $resultado = ($num1 * $num2);
            break;

        case '/';
            $resultado = ($num1 / $num2);
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>

    <style>
        *{
        margin: 2px;
        }
        body {
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            //background: #181818;
            background: linear-gradient(50deg,#b6defa, #965c93, #6b54dd, #22bb8a,#636abf, #3786ee);
        }
        div {
            background-color: rgba(180, 180, 180, 0.392);
            box-shadow: 5px 5px 15px rgba(40, 39, 39, 0.633);
            color: white;
            border-radius: 30px;
            padding: 60px;
            text-align: center;
            font-family: arial;
        }
        .num {
            padding: 10px;
            margin: 10px;
            border-radius: 25px;
            border: none;
            box-shadow: 5px 5px 15px rgba(40, 39, 39, 0.633);
        }
        .operacao {
            background-color: #b6defa;
            border-radius: 20px;
            border: none;
            height: 30px;
        }
        .button {
            background: #6574fe;
            border-radius: 15px;
            width: 70px;
            height: 30px;
            box-shadow: 5px 5px 15px rgba(40, 39, 39, 0.633);
        }
   </style>
</head>

<body>
    <div>
        <h1>Calculadora</h1> <br>
        <form action="calculadora.php" method="GET">
            <input type="number" class="num" name="num1" required> <br>

            <select class="operacao" name="calcular">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select> <br> 

            <input type="number" class="num" name="num2" required> <br><br>

            <input type="submit" class="button" name="enter" value="Calcular"> <br><br>
            <h3>Resultado: <?= $resultado ?></h3>
        </form>
    </div>
</body>