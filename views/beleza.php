<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script defer src="../assets/js/script.js"></script>
    <title>Minha Loja - Carrinho Lateral</title>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">🛒 MinhaLoja</div>
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Buscar produtos...">
                <button onclick="buscarProduto()">Buscar</button>
            </div>
            <div class="header-buttons">
                <button onclick="alert('Função de login em breve!')">Entrar</button>
                <button class="carrinho_btn">🛍️ Carrinho<span>0</span></button>
            </div>
        </header>
        <nav class="categorias">
    <a href="eletronicos.php">Eletrônicos</a>
    <a href="roupas.php">roupas</a>
    <a href="home.php">ofertas do dia</a>
    <a href="casa.php">Casa</a>
    <a href="esportes.php">Esportes</a>
  </nav>

  <main>
    <h1>Beleza</h1>
    <div class="produtos">
      <?php
        $produtos = [
          ["nome" => "batom ax love", "preco" => 39.90, "imagem" => "https://ecoms1-nyc3.nyc3.cdn.digitaloceanspaces.com/51331/@v3/1675618861952-batommaxloveliquido30horascor606ate6111.jpg"],
          ["nome" => "Gloss Patrick ta", "preco" => 79.90, "imagem" => "https://media1.popsugar-assets.com/files/thumbor/Os2ftiHqlmcagyDSf_ftsjzQso8/fit-in/1024x1024/filters:format_auto-!!-:strip_icc-!!-/2019/07/17/797/n/1922153/6f1a6e865d2f63ee147c39.32762073_/i/Best-Lip-Gloss.jpg"],
          ["nome" => "Conjunto unhas postiças", "preco" => 59.99, "imagem" => "https://tse2.mm.bing.net/th/id/OIP.Xpbql69ryaIjmIu3d2uVxgHaHa?cb=ucfimg2ucfimg=1&rs=1&pid=ImgDetMain&o=7&rm=3"],
          ["nome" => "Gel de cabelo masculino", "preco" => 35.70, "imagem" => "https://a-static.mlcdn.com.br/800x800/kings-premium-gel-fixador-masculino-extra-forte-240g/amidagobaldi/372a9554514311ec95874201ac18503a/4d5c23d190459e65d4b96860e5efa2af.jpg"]
        ];

        foreach ($produtos as $produto) {
          echo "
            <div class='card'>
              <img src='{$produto['imagem']}' alt='{$produto['nome']}'>
              <h3>{$produto['nome']}</h3>
              <p>R$ ".number_format($produto['preco'], 2, ',', '.')."</p>
              <button onclick=\"adicionarCarrinho('{$produto['nome']}')\">Adicionar ao carrinho</button>
            </div>
          ";
        }
      ?>
    </div>
  </main>

  <footer>
    <p>© 2025 MinhaLoja. Todos os direitos reservados.</p>
  </footer>
    </div>
    <div class="cartTab">
        <h2>🛍️ Seu Carrinho</h2>

        <div class="ListCart">
            
        </div>

        <div class="btn">
            <button class="fechar">Fechar</button>
            <button class="comprar">Comprar</button>
        </div>
    </div>
</body>
</html>