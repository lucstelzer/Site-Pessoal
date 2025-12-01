const elementos = document.getElementsByClassName('produto_preco');

let soma = 0;
for (const el of elementos) {
    soma += parseFloat(el.innerText) || 0;
}
const totalEl = document.getElementById('total');
if (totalEl) totalEl.innerText = `R$ ${soma.toFixed(2)}`;

const cafes = [
    { nome: 'Café em pó 500g', imagem: 'cafe1' },
    { nome: 'Café em grão 500g', imagem: 'cafe2' },
    { nome: 'Café especial para moka e prensa francesa 250g', imagem: 'cafe3' }
];

const cachacas = [
    { nome: 'Cachaça branca', imagem: 'cachaca1' },
    { nome: 'Cachaça amarela', imagem: 'cachaca2' }
];

const select_produtos = document.getElementById('select_produtos');
const div = document.getElementById('container');
const p = document.getElementById('nome');

if (select_produtos) select_produtos.addEventListener('change', listarProdutos);
if (div) div.addEventListener('mouseover', mostrarNome);
if (div) div.addEventListener('mouseout', limparNome);

function listarProdutos() {
    limparDivContainer();

    const produtos = (select_produtos && select_produtos.value === 'Cafés') ? cafes : cachacas;

    for (const produto of produtos) {
        const novaDiv = document.createElement('div');
        const img = document.createElement('img');
        img.src = `./Imagens/${produto.imagem}.jpg`;
        img.alt = produto.nome;
        img.dataset.nome = produto.nome;
        novaDiv.appendChild(img);
        div.appendChild(novaDiv);
    }
}

function mostrarNome(e) {
    const nome = e.target && e.target.dataset ? e.target.dataset.nome : '';
    p.innerText = nome || 'Tipo do produto selecionado: ';
}

function limparNome() {
    p.innerText = 'Tipo do produto selecionado: ';
}

function limparDivContainer() {
    while (div.firstChild) div.removeChild(div.firstChild);
}