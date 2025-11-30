<?php
session_start();
if ((isset($_SESSION['id_clientes']) && !empty($_SESSION['id_clientes']))) {

} else {
      
}
if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] === 'admin') 
    echo " <a href='../controllers/produtos.php'>Gerenciar Produtos</a>";
?>
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
            <div class="logo">🛒 MinhaLoja <a href="home.php"></a></div>
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Buscar produtos...">
                <button onclick="buscarProduto()">Buscar</button>
            </div>
            <div class="header-buttons">
                <a href="../controllers/logout.php"><button>Sair</button></a>
                <button class="carrinho_btn">🛍️ Carrinho<span>0</span></button>
            </div>
        </header>
        <nav class="categorias">
        <a href="eletronicos.php">Eletrônicos</a>
        <a href="roupas.php">Roupas</a>
        <a href="beleza.php">Beleza</a>
        <a href="casa.php">Casa</a>
        <a href="esportes.php">Esportes</a>
        </nav>

        <main>
            <h1>Ofertas do Dia</h1>
            <div class="produtos">
            <?php
                $produtos = [
                ["nome" => "Fone Bluetooth", "preco" => 109.90, "imagem" => "https://a-static.mlcdn.com.br/800x800/fone-de-ouvido-bluetooth-pequeno-original-com-microfone-ltomex/fgcplayimports/264d1930072911eeb4554201ac185049/daf0dcbd24eadbb66f555866839ac594.jpeg"],
                ["nome" => "Camisa Polo", "preco" => 59.90, "imagem" => "https://tse4.mm.bing.net/th/id/OIP.l-0Z-iCXxep_SvoUjbLwNQHaJ-?cb=ucfimg2ucfimg=1&rs=1&pid=ImgDetMain&o=7&rm=3"],
                ["nome" => "Relógio Smart", "preco" => 159.99, "imagem" => "https://tse3.mm.bing.net/th/id/OIP.pNvdv8cgdyapaVaqq2mTFwAAAA?cb=ucfimg2ucfimg=1&rs=1&pid=ImgDetMain&o=7&rm=3"],
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