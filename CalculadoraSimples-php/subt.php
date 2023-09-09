<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subtração</title>
    <style>
        body {
              width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #181818;
            color: white;
        }
    </style>
</head>
<body>
    <?php

        $v1 = $_GET['v1'];
        $v2 = $_GET['v2'];
        $result = 0;

        $result = $v1 - $v2;
        echo "<h1>Resultado: $result</h1:>";
    ?>  <br> <br>
    <a href="index.html">Voltar</a>
</body>
</html>