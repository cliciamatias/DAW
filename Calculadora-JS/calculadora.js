function calcular()
{
    var v1 = parseFloat(document.getElementById('v1').value);
    var v2 = parseFloat(document.getElementById('v2').value);
    var op = document.getElementById('op').value;
    var resultado;

    switch(op)
    {
        case '+':
            resultado = v1 + v2;
            break;
        case '-':
            resultado = v1 - v2;
            break;
        case '*':
            resultado = v1 * v2;
            break;
        case '/':
            resultado = v1 / v2;
            break;
        case 'x²':
            resultado = v1 * v1;
            break;
    }

    console.log(resultado);
    document.getElementById('resultado').innerText = "Resultado: " + resultado; //para exibir o resultado
    return resultado;  //retornar o resultado
}
