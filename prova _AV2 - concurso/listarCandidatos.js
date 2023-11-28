document.addEventListener("DOMContentLoaded", function{
    carregarCandidatos();
});

function carregarCandidatos(){
   let xmlhttp = new XMLHttp.Request();

   xmlhttp.onreadystatechange = function(){
    
        let candidatos = JSON.parse(responseText);
        let tabela = document.getElementById("tabelaCandidatos");
        if(this.readyState == 4 && this.status == 200)
        {
            console.log(this.responseText);

            for(i=0; i<candidatos.length; i++)
            {
                let linha = tabela.insertRow(-1);
                let nome = linha.insertCell(0);
                let cpf = linha.insertCell(1);
                let identidade = linha.insertCell(2);
                let email = linha.insertCell(3);
                let cargo = linha.insertCell(4);
                let sala = linha.insertCell(5);
                let alterar = liha.insertCell(6);
                    
                nome.innerHTML = candidatos[i].nome;
                cpf.innerHTML = candidatos[i].cpf;
                identidade.innerHTML = candidatos[i].identidade;
                email.innerHTML = candidatos[i].email;
                cargo.innerHTML = candidatos[i].candidatos;
                sala.innerHTML = candidatos[i].sala;             
                alterar.innerHTML = 
                    '<form action="adicionarCandidato.php" method="GET">' +
                    '<input type="hidden" name="cpf" value="' + produtos[i].cpf + '">' +
                    '</form>';
            }
        }
    };
    xmlhttp.open("GET", "listarCandidatos.php", true);

    xmlhttp.send();
}
