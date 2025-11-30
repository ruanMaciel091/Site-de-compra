let carrinho_btn = document.querySelector('.carrinho_btn');
let fechar = document.querySelector('.fechar')
let body = document.querySelector('body');
let listaCarrinho = document.querySelector('.ListCart');
let contador = document.querySelector('.carrinho_btn span');

let carrinhoArray = [];

const listaProdutos = [
    { "nome": "Fone Bluetooth", "preco": 109.90, "imagem": "https://a-static.mlcdn.com.br/800x800/fone-de-ouvido-bluetooth-pequeno-original-com-microfone-ltomex/fgcplayimports/264d1930072911eeb4554201ac185049/daf0dcbd24eadbb66f555866839ac594.jpeg" },
    { "nome": "Camisa Polo", "preco": 59.90, "imagem": "https://tse4.mm.bing.net/th/id/OIP.l-0Z-iCXxep_SvoUjbLwNQHaJ-?cb=ucfimg2ucfimg=1&rs=1&pid=ImgDetMain&o=7&rm=3" },
    { "nome": "Relógio Smart", "preco": 159.99, "imagem": "https://tse3.mm.bing.net/th/id/OIP.pNvdv8cgdyapaVaqq2mTFwAAAA?cb=ucfimg2ucfimg=1&rs=1&pid=ImgDetMain&o=7&rm=3" },
    { "nome": "Cafeteira Elétrica", "preco": 149.00, "imagem": "https://carrefourbr.vtexassets.com/arquivos/ids/15891802-1280-auto?v=637541744062930000&width=1280&height=auto&aspect=true/150" },
    { "nome": "teclado gamer", "preco": 229.99, "imagem": "https://cdn.awsli.com.br/2500x2500/25/25449/produto/2259076180446699e59.jpg" },
    { "nome": "Fone de gatinho", "preco": 139.49, "imagem": "https://http2.mlstatic.com/fone-ouvido-gatinho-bluetooth-headfone-orelha-gato-c-led-p2-D_NQ_NP_860064-MLB29576217745_032019-F.jpg" },
    { "nome": "Conjunto feminino", "preco": 299.90, "imagem": "https://i.pinimg.com/originals/63/34/01/63340126e22894145908e529367a909a.jpg" },
    { "nome": "Camisa Polo Masculina", "preco": 79.90, "imagem": "https://tse4.mm.bing.net/th/id/OIP.l-0Z-iCXxep_SvoUjbLwNQHaJ-?cb=ucfimg2ucfimg=1&rs=1&pid=ImgDetMain&o=7&rm=3" },
    { "nome": "Calça jeans feminina", "preco": 119.99, "imagem": "https://tse1.mm.bing.net/th/id/OIP.hcRf1X2zMU7Weel1m3RXXAHaHa?cb=ucfimg2ucfimg=1&rs=1&pid=ImgDetMain&o=7&rm=3" },
    { "nome": "Jaqueta de couro", "preco": 189.00, "imagem": "https://imaginacaofertil.com.br/wp-content/uploads/2022/01/Jaqueta-de-couro-Imaginacao-Fertil-37-1.jpg" },
    { "nome": "batom ax love", "preco": 39.90, "imagem": "https://ecoms1-nyc3.nyc3.cdn.digitaloceanspaces.com/51331/@v3/1675618861952-batommaxloveliquido30horascor606ate6111.jpg" },
    { "nome": "Gloss Patrick ta", "preco": 79.90, "imagem": "https://media1.popsugar-assets.com/files/thumbor/Os2ftiHqlmcagyDSf_ftsjzQso8/fit-in/1024x1024/filters:format_auto-!!-:strip_icc-!!-/2019/07/17/797/n/1922153/6f1a6e865d2f63ee147c39.32762073_/i/Best-Lip-Gloss.jpg" },
    { "nome": "Conjunto unhas postiças", "preco": 59.99, "imagem": "https://tse2.mm.bing.net/th/id/OIP.Xpbql69ryaIjmIu3d2uVxgHaHa?cb=ucfimg2ucfimg=1&rs=1&pid=ImgDetMain&o=7&rm=3" },
    { "nome": "Gel de cabelo masculino", "preco": 35.70, "imagem": "https://a-static.mlcdn.com.br/800x800/kings-premium-gel-fixador-masculino-extra-forte-240g/amidagobaldi/372a9554514311ec95874201ac18503a/4d5c23d190459e65d4b96860e5efa2af.jpg" },
    { "nome": "Geladeira eletrolux", "preco": 3489.90, "imagem": "https://http2.mlstatic.com/geladeira-electrolux-frost-free-310-litros-inox-110v-df36x-D_NQ_NP_826488-MLB31836284966_082019-F.jpg" },
    { "nome": "Cadeira presidencial", "preco": 199.90, "imagem": "https://tse4.mm.bing.net/th/id/OIP.umiwP50NLYcHxi2A3ZfW3gHaHa?cb=ucfimg2ucfimg=1&rs=1&pid=ImgDetMain&o=7&rm=3" },
    { "nome": "Sofá", "preco": 189.99, "imagem": "https://th.bing.com/th/id/R.8729d14284dd07376f5d62e0ed3fcec0?rik=JlMgsS5AlZx%2fww&pid=ImgRaw&r=0" },
    { "nome": "Bola de basquete", "preco": 129.90, "imagem": "https://cdn.awsli.com.br/2500x2500/1537/1537255/produto/56511739652db2fd85.jpg" },
    { "nome": "Bola de vôlei", "preco": 139.90, "imagem": "https://http2.mlstatic.com/D_NQ_NP_888807-MLB31468780271_072019-F.jpg" },
    { "nome": "Bola de futebol", "preco": 149.99, "imagem": "https://decathlonpro.vteximg.com.br/arquivos/ids/31631677-1000-1000/-bola-campo-penalty-bravo-23-no-size1.jpg?v=638182898483130000" },
    { "nome": "bola de Tênis", "preco": 89.00, "imagem": "https://th.bing.com/th/id/OIP.yu931g-ZwYp5uawsWPTFFwHaHa?o=7&cb=ucfimg2rm=3&ucfimg=1&rs=1&pid=ImgDetMain&o=7&rm=3" }
];

carrinho_btn.addEventListener('click', () => {
    body.classList.toggle('showCart')
})
fechar.addEventListener('click', () => {
    body.classList.remove('showCart')
})

function adicionarCarrinho(nomeProduto) {
    let existeItem = carrinhoArray.find(item => item.nome === nomeProduto);
    const produto = listaProdutos.find(p => p.nome === nomeProduto);

    if (!produto) return;

    if (existeItem) {
        existeItem.qtd++;
    } else {
        carrinhoArray.push({
            nome: produto.nome,
            preco: produto.preco,
            imagem: produto.imagem,
            qtd: 1
        });
    }

    atualizarCarrinho();
}

function aumentar(nomeProduto) {
    let item = carrinhoArray.find(i => i.nome === nomeProduto);
    if (item) item.qtd++;
    atualizarCarrinho();
} 

function diminuir(nomeProduto) {
    let item = carrinhoArray.find(i => i.nome === nomeProduto);
    
    if(!item) return;
    if(item.qtd > 1) {
        item.qtd--;
    } else {
        carrinhoArray = carrinhoArray.filter(i => i.nome !== nomeProduto)
    }

    atualizarCarrinho();
}

function removerItem(nomeProduto) {
    carrinhoArray = carrinhoArray.filter (item => item.nome !== nomeProduto);
    atualizarCarrinho();
}

function atualizarCarrinho() {
    listaCarrinho.innerHTML = "";
    let totalItens = 0;

    carrinhoArray.forEach(item => {
        const div = document.createElement('div');
        div.classList.add("item");

        div.innerHTML = `
            <img src="${item.imagem}" alt="${item.nome}">
            
            <div class="detalhes">
                <div class="nome">${item.nome}</div>
                <div class="preco">R$ ${item.preco.toFixed(2).replace('.', ',')}</div>
                
                <div class="qtde">
                    <button onclick="diminuir('${item.nome}')">-</button>
                    <span>${item.qtd}</span>
                    <button onclick="aumentar('${item.nome}')">+</button>
                </div>
            </div>

            <button class="remover" onclick="removerItem('${item.nome}')">Remover Tudo</button> 
        `;

        listaCarrinho.appendChild(div);
        totalItens += item.qtd;
    });

    contador.textContent = totalItens;
    salvarCarrinho();
}

function salvarCarrinho() {
    localStorage.setItem('carrinho', JSON.stringify(carrinhoArray));
}

function carregarCarrinho() {
    const data = localStorage.getItem('carrinho');
    if (data) {
        carrinhoArray = JSON.parse(data);
        atualizarCarrinho();
    }
}

carregarCarrinho();

function buscarProduto() {
    const termo = document.getElementById('searchInput').value;
    alert(`Buscando por: ${termo}`);
}