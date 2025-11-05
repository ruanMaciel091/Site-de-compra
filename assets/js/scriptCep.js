function BuscarCep() {
    var cep = document.getElementById("cep").value;
    var url = "https://viacep.com.br/ws/" + cep + "/json/";
    fetch(url) 
        .then(response => response.json())
        .then(data => {
            if (data.erro) {
                alert("CEP não encontrado");
            } else {
                document.getElementsByName("rua")[0].value = data.logradouro;
                document.getElementsByName("bairro")[0].value = data.bairro;
                document.getElementsByName("cidade")[0].value = data.localidade;
                document.getElementsByName("estado")[0].value = data.uf;
            }
        })
        .catch(error => {
            console.error("Erro ao consultar o CEP:", error);
            
        });
}
