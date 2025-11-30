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
    <a href="casa.php">Casa</a>
    <a href="home.php">Ofertas do dia</a>
  </nav>

  <main>
    <h1>Esportes</h1>
    <div class="produtos">
      <?php
        $produtos = [
          ["nome" => "Bola de basquete", "preco" => 129.90, "imagem" => "https://cdn.awsli.com.br/2500x2500/1537/1537255/produto/56511739652db2fd85.jpg"],
          ["nome" => "Bola de vôlei", "preco" => 139.90, "imagem" => "https://http2.mlstatic.com/D_NQ_NP_888807-MLB31468780271_072019-F.jpg"],
          ["nome" => "Bola de futebol", "preco" => 149.99, "imagem" => "https://decathlonpro.vteximg.com.br/arquivos/ids/31631677-1000-1000/-bola-campo-penalty-bravo-23-no-size1.jpg?v=638182898483130000"],
          ["nome" => "bola de Tênis", "preco" => 89.00, "imagem" => "https://th.bing.com/th/id/OIP.yu931g-ZwYp5uawsWPTFFwHaHa?o=7&cb=ucfimg2rm=3&ucfimg=1&rs=1&pid=ImgDetMain&o=7&rm=3"]
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