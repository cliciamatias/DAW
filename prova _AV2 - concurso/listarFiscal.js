document.addEventListener("DOMContentLoaded", function{
    carregarFiscal();
});

function carregarFiscal(){
   let xmlhttp = new XMLHttp.Request();

   xmlhttp.onreadystatechange = function(){
    
        let fiscal = JSON.parse(responseText);
        let tabela = document.getElementById("tabelaFiscal");
        if(this.readyState == 4 && this.status == 200)
        {
            console.log(this.responseText);
            for(i=0; i<fiscal.length; i++)
            {
                let linha = tabela.insertRow(-1);
                let nome = linha.insertCell(0);
                let cpf = linha.insertCell(1);
                let sala = linha.insertCell(5);
                    
                nome.innerHTML = candidatos[i].nome;
                cpf.innerHTML = candidatos[i].cpf;
                sala.innerHTML = candidatos[i].sala;   
            }
        }
    };
    xmlhttp.open("GET", "listarFiscal.php", true);
    xmlhttp.send();
}
