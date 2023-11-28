document.addEventListener("DOMContentLoaded", function{
    carregarfiscal();
});

function carregarFiscal(){
   let xmlhttp = new XMLHttp.Request();

   xmlhttp.onreadystatechange = function(){
    
        let fiscal = JSON.parse(responseText);
        let tabela = document.getElementById("formFiscal");
        if(this.readyState == 4 && this.status == 200)
        {
            console.log(this.responseText);

            for(i=0; i<fiscal.length; i++)
            {
                let linha = tabela.insertRow(-1);
                let nome = linha.insertCell(0);
                let cpf = linha.insertCell(1);
                let sala = linha.insertCell(5);
                    
                nome.innerHTML = fiscal[i].nome;
                cpf.innerHTML = fiscal[i].cpf;
                sala.innerHTML = fiscal[i].sala; 
            }
        }
    };
    xmlhttp.open("GET", "incluirFiscal.php", true);

    xmlhttp.send();
}

