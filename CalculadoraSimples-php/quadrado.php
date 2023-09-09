<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quadrado</title>
    <style>
       body {
            height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            text-align: center;
            justify-content: center;
            background: #181818;
            color: white;
       }
    </style>
</head>
<body>
    <?php
        $v1 = $_GET['v1'];
        $result = 0;

        $result = $v1 * $v1;
        echo "<h1>Resultado: $result</h1:>";
    ?>  <br> <br>
    <a href="index.html">Voltar</a>
</body>
</html>