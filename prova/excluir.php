<?php
    //abrindo e lendo o arquivo 'produtos.txt'
    $produtos = fopen("produtos.txt", "r") or die("Erro ao abrir arquivo");
    //abrindo arquivo auxiliar, que terá os produtos do carrinho sem o produto escholhido para ser removido
    $produtosCarrinho = fopen("novosProdutos.txt", "w") or die("Erro ao abrir arquivo"); 

    $i = 0; //inicializando a repetição
    $linha[] = fgets($produtos); //'linha' recebendo cada informação do arquivo 'produtos'

    //verificando se houve requisição POST através do formulário
    if($_SERVER['REQUEST_METHOD'] == 'POST')  
    {
        while(!feof($produtos))
        {
            //verificando se existe o 'id' do produto a ser removido
            if(isset($_POST["id"]))
            {
                $linha[] = fgets($produtos);
                $colunaDados = explode(";", $linha[$i]); //separando os dados de cada linha em colunas por ';'
                $id = $colunaDados[0];
                $nome = $colunaDados[1];
                $quantidade = $colunaDados[2];
                $valor = $colunaDados[3];

                //Montando a linha a ser inserida no arquivo de texto
                $texto = $id . ";" . $nome . ";" . $quantidade . ";" . $valor . ";";
                fwrite($novosProdutos, $texto); //escrevendo no arquivo
                $i++;
            }
        }
        //fechando os arquivos
        fclose($produtos);
        fclose($novosProdutos);
    }
    header('location: carrinho.php'); //redireionando para o "manter" no carrinho, mas sem o produto removido
    ?>