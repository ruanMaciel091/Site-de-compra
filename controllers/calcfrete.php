<?php
session_start();


if (!isset($_GET["ajax"])) {
    header("Content-Type: application/javascript");
?>
function pesquisacep(valor) {
    let cep = valor.replace(/\D/g, '');

    if (cep.length !== 8) {
        document.getElementById("resultado").innerHTML = "CEP inválido.";
        return;
    }

    fetch("../controllers/calcfrete.php?ajax=1&cep=" + cep)
        .then(res => res.text())
        .then(txt => {
            document.getElementById("resultado").innerHTML = txt;
        })
        .catch(() => {
            document.getElementById("resultado").innerHTML = "Erro ao calcular frete.";
        });
}
<?php
    exit;
}

// 2. AJAX: CALCULAR O FRETE
function consultaCEP($cep) {
    $cep = preg_replace('/[^0-9]/', '', $cep);
    if (strlen($cep) !== 8) return false;

    $url = "https://viacep.com.br/ws/{$cep}/json/";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($curl);
    curl_close($curl);

    if (!$response) return false;

    $dados = json_decode($response, true);

    if (isset($dados["erro"])) return false;

    return $dados;
}

function calcularFrete($uf) {
    $tabela = [
        "AC"=>35,"AP"=>35,"AM"=>35,"PA"=>35,"RO"=>35,"RR"=>35,"TO"=>35,
        "MA"=>30,"PI"=>30,"CE"=>30,"RN"=>30,"PB"=>30,"PE"=>30,
        "AL"=>30,"SE"=>30,"BA"=>30,
        "MT"=>25,"MS"=>25,"GO"=>25,"DF"=>25,
        "SP"=>20,"RJ"=>20,"ES"=>20,"MG"=>20,
        "PR"=>22,"SC"=>22,"RS"=>22
    ];
    return $tabela[$uf] ?? 0;
}

$cep = $_GET["cep"] ?? "";
$dados = consultaCEP($cep);

if (!$dados) {
    echo "CEP inválido ou não encontrado.";
    exit;
}

$uf = $dados["uf"];
$frete = calcularFrete($uf);

echo "Frete: <strong>R$ " . number_format($frete, 2, ',', '.') . "</strong>";
exit;