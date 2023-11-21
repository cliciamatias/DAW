document.addEventListener("DOMContentLoaded", carregarCarrinho);

function carregarCarrinho()
{
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
    {
        // Quando a solicitação é concluída e bem-sucedida
        if(this.readyState == 4 && this.status == 200)
        {
            // Analisa a resposta JSON em um objeto JavaScript
            let carrinho = JSON.parse(this.responseText);

            // Obtém a tabela HTML pelo ID
            let tabela = document.getElementById("tabelaCarrinho");

            for(let item of carrinho)
            {
                // Insere uma nova linha na tabela
                let linha = tabela.insertRow();

                // Insere células na linha para o ID, nome, valor e ação
                linha.insertCell().innerHTML = item.id;
                linha.insertCell().innerHTML = item.nome;
                linha.insertCell().innerHTML = "R$ " + item.valor;
                linha.insertCell().innerHTML = 
                    `<form action="removerCarrinho.php" method="GET">
                        <input type="hidden" name="id" value="${item.id}">
                        <button type="submit">Remover produto</button>
                    </form>`;
            }
            document.getElementById("totalCompra").innerHTML = "Valor total: R$ " + total.toFixed(2);
        }
    };
    // Abrindo uma solicitação GET
    xmlhttp.open("GET", "lerCarrinho.php", true);
    // Enviando a solicitação
    xmlhttp.send();
}
