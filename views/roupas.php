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
    <a href="home.php">ofertas do dia</a>
    <a href="beleza.php">Beleza</a>
    <a href="casa.php">Casa</a>
    <a href="esportes.php">Esportes</a>
    </nav>

    <main>
        <h1>Roupas</h1>
        <div class="produtos">
        <?php
            $produtos = [
            ["nome" => "Conjunto feminino", "preco" => 299.90, "imagem" => "https://i.pinimg.com/originals/63/34/01/63340126e22894145908e529367a909a.jpg"],
            ["nome" => "Camisa Polo Masculina", "preco" => 79.90, "imagem" => "https://tse4.mm.bing.net/th/id/OIP.l-0Z-iCXxep_SvoUjbLwNQHaJ-?cb=ucfimg2ucfimg=1&rs=1&pid=ImgDetMain&o=7&rm=3"],
            ["nome" => "Calça jeans feminina", "preco" => 119.99, "imagem" => "https://tse1.mm.bing.net/th/id/OIP.hcRf1X2zMU7Weel1m3RXXAHaHa?cb=ucfimg2ucfimg=1&rs=1&pid=ImgDetMain&o=7&rm=3"],
            ["nome" => "Jaqueta de couro", "preco" => 189.00, "imagem" => "https://imaginacaofertil.com.br/wp-content/uploads/2022/01/Jaqueta-de-couro-Imaginacao-Fertil-37-1.jpg"]
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