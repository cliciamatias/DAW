<?php

$v1 = $_GET['v1'];
$v2 = $_GET['v2'];
$operacao = $_GET['op'];

switch($operacao)
{
    case '+': 
        header('Location: soma.php?v1=' . $v1 . '&v2=' . $v2);
        break;

    case '-': 
        header('Location: subt.php?v1=' . $v1 . '&v2=' . $v2);
        break;

    case '/': 
        header('Location: divisao.php?v1=' . $v1 . '&v2=' . $v2);
        break;

    case '*': 
        header('Location: multip.php?v1=' . $v1 . '&v2=' . $v2);
        break;

    case 'x²': 
        header('Location: quadrado.php?v1=' . $v1);
        break;

    case 'sen': 
        header('Location: sen.php?v1=' . $v1);
        break;

    case 'cos': 
        header('Location: cos.php?v1=' . $v1);
        break;
}
?>
