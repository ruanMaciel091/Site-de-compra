<?php
include '../config/config.php';
session_start();
$carrinho = $_SESSION['carrinho'] ?? [];
$subtotal = 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../assets/css/style.css">
<script defer src="../assets/js/script.js"></script>
<title>Finalizar Compra</title>
</head>
<body>
<header class="topo"><h2>🛍️ Finalização da Compra</h2></header>

<main class="conteudo">
    <section class="secao">
        <h3>📦 Seus Produtos</h3>
        
        <?php if (empty($carrinho)): ?>
            <p>Teu carrinho tá vazio, man!</p>
        <?php else: ?>
            <table style="width:100%; border-collapse: collapse;">
                <thead>
                    <tr style="text-align:left; border-bottom:1px solid #ddd;">
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>QTD</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                foreach ($carrinho as $item):
                    $linha = $item['preco'] * $item['qtd'];
                    $subtotal += $linha;
                ?>
                    <tr style="border-bottom:1px solid #eee;">
                        <td style="padding:8px;">
                            <div style="display:flex; align-items:center;">
                                <?php if (!empty($item['imagem'])): ?>
                                    <img src="<?php echo htmlspecialchars($item['imagem']); ?>" alt="<?php echo htmlspecialchars($item['nome']); ?>" style="width:70px; height:auto; margin-right:12px; object-fit:cover; border-radius:6px;">
                                <?php endif; ?>
                                <div>
                                    <strong><?php echo htmlspecialchars($item['nome']); ?></strong>
                                </div>
                            </div>
                        </td>
                        <td style="padding:8px;">R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?></td>
                        <td style="padding:8px;"><?php echo intval($item['qtd']); ?></td>
                        <td style="padding:8px;">R$ <?php echo number_format($linha, 2, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </section>

    <section class="secao">
        <input type="text" id="cep" placeholder="Digite o CEP" onblur="pesquisacep(this.value);">
        <h3>💳 Total</h3>
        <p><strong>Subtotal:</strong> R$ <span id="subtotal"><?php echo number_format($subtotal, 2, ',', '.'); ?></span></p>
        <p><strong>Frete:</strong> R$ <span id="resultado">0,00</span></p>
        <p><strong>Total Geral:</strong> R$ <span id="totalGeral"><?php echo number_format($subtotal, 2, ',', '.'); ?></span></p>

        <button class="btn-finalizar" onclick="concluirCompra()">Finalizar Compra</button>
    </section>
</main>

<script>
function concluirCompra() {
    alert("Compra finalizada! Obrigado por comprar conosco.");
    window.location.href = "home.php";
}
</script>
<style>.topo {
    background: orange;
    padding: 15px;
    color: #fff;
    text-align: center;
    font-size: 22px;
    font-weight: bold;
}

.conteudo {
    max-width: 900px;
    margin: auto;
    padding: 20px;
}

.secao {
    background: #fff;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 8px;
    box-shadow: 0 0 8px rgba(0,0,0,0.1);
}

#listaProdutos .item {
    display: flex;
    align-items: center;
    padding: 10px 0;
    border-bottom: 1px solid #ddd;
}

#listaProdutos img {
    width: 80px;
    margin-right: 15px;
}

.item-nome {
    flex: 1;
}

.item-preco {
    font-weight: bold;
}

.btn-finalizar {
    width: 100%;
    padding: 12px;
    background: green;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 18px;
    cursor: pointer;
}</style>
</body>
</html>