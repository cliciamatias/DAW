<?php
    $id = $_GET['id'];
    if(isset($_GET['id'])) 
    {   //abrindo o arquivo
        $arqAluno = 'dadosAluno.txt';
        $linha = file($arqAluno);
        
        //verificando o indice do aluno a ser removido
        if($id >= 0 && $id < count($linha)) 
        {
            //removendo o aluno do vetor 'linha' através do índice 'id' do aluno
            array_splice($linha, $id, 1);

            //reescrevendo o arquivo (como no iditar), só que sem o aluno excluído
            file_put_contents($arqAluno, implode('', $linha));

            //redirecionando de volta para a lista de alunos após a exclusão (o mantém em 'lerAluno.php')
            header('Location: lerAluno.php');
        } 
    } 
?>