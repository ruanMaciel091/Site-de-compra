<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>
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
    <a href="home.php">ofertas do dia</a>
    <a href="roupas.php">Roupas</a>
    <a href="beleza.php">Beleza</a>
    <a href="casa.php">Casa</a>
    <a href="esportes.php">Esportes</a>
  </nav>

  <main>
    <h1>Eletrônicos</h1>
    <div class="produtos">
      <?php
        $produtos = [
          ["nome" => "Fone Bluetooth", "preco" => 109.90, "imagem" => "https://a-static.mlcdn.com.br/800x800/fone-de-ouvido-bluetooth-pequeno-original-com-microfone-ltomex/fgcplayimports/264d1930072911eeb4554201ac185049/daf0dcbd24eadbb66f555866839ac594.jpeg"],
          ["nome" => "teclado gamer", "preco" => 229.99, "imagem" => "https://cdn.awsli.com.br/2500x2500/25/25449/produto/2259076180446699e59.jpg"],
          ["nome" => "Relógio Smart", "preco" => 159.99, "imagem" => "https://tse3.mm.bing.net/th/id/OIP.pNvdv8cgdyapaVaqq2mTFwAAAA?cb=ucfimg2ucfimg=1&rs=1&pid=ImgDetMain&o=7&rm=3"],
          ["nome" => "Fone de gatinho", "preco" => 139.49, "imagem" => "https://http2.mlstatic.com/fone-ouvido-gatinho-bluetooth-headfone-orelha-gato-c-led-p2-D_NQ_NP_860064-MLB29576217745_032019-F.jpg"]
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