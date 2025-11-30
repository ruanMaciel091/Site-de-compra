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
    <a href="roupas.php">Roupas</a>
    <a href="beleza.php">Beleza</a>
    <a href="home.php">Ofertas do dia</a>
    <a href="esportes.php">Esportes</a>
  </nav>

  <main>
    <h1>Casa</h1>
    <div class="produtos">
      <?php
        $produtos = [
          ["nome" => "Geladeira eletrolux", "preco" => 3489.90, "imagem" => "https://http2.mlstatic.com/geladeira-electrolux-frost-free-310-litros-inox-110v-df36x-D_NQ_NP_826488-MLB31836284966_082019-F.jpg"],
          ["nome" => "Cadeira presidencial", "preco" => 199.90, "imagem" => "https://tse4.mm.bing.net/th/id/OIP.umiwP50NLYcHxi2A3ZfW3gHaHa?cb=ucfimg2ucfimg=1&rs=1&pid=ImgDetMain&o=7&rm=3"],
          ["nome" => "Sofá", "preco" => 189.99, "imagem" => "https://th.bing.com/th/id/R.8729d14284dd07376f5d62e0ed3fcec0?rik=JlMgsS5AlZx%2fww&pid=ImgRaw&r=0"],
          ["nome" => "Cafeteira Elétrica", "preco" => 149.00, "imagem" => "https://carrefourbr.vtexassets.com/arquivos/ids/15891802-1280-auto?v=637541744062930000&width=1280&height=auto&aspect=true/150"]
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