function carregarProdutos()
{
    // Cria um novo objeto XMLHttpRequest
    let xmlhttp = new XMLHttpRequest();

    // Define uma função para ser chamada quando o estado da solicitação muda
    xmlhttp.onreadystatechange = function()
    {
        // Quando a solicitação é concluída e bem-sucedida
        if(this.readyState == 4 && this.status == 200)
        {
            // Analisa a resposta JSON em um objeto JavaScript
            let produtos = JSON.parse(this.responseText);

            // Obtém a tabela HTML pelo ID
            let tabela = document.getElementById("tabelaProdutos");

            // Para cada produto no objeto produtos
            for(let produto of produtos)
            {
                // Insere uma nova linha na tabela
                let linha = tabela.insertRow();

                // Insere células na linha para o ID, nome, valor e ação
                linha.insertCell().innerHTML = produto.id;
                linha.insertCell().innerHTML = produto.nome;
                linha.insertCell().innerHTML = "R$ " + produto.valor;
                linha.insertCell().innerHTML = 
                    `<form action="lerProdutos.php" method="GET">
                        <input type="hidden" name="id" value="${produto.id}">
                        <input type="number" name="quantidade" id="quantidade">
                        <button type="submit">Adicionar produto</button>
                    </form>`;
            }
        }
    };
    // Abre uma solicitação GET para "lerProdutos.php"
    xmlhttp.open("GET", "lerProdutos.php", true);
    // Envia a solicitação
    xmlhttp.send();
}
