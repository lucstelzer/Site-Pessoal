<?php
require_once 'database/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $mensagem = $_POST['mensagem'] ?? '';

    try {
        // Prepara a query SQL (use nomes de colunas iguais aos da sua tabela no Supabase)
        $sql = "INSERT INTO form (name, email, tel, mensagem) VALUES (:name, :email, :tel, :mensagem)";
        $stmt = $pdo->prepare($sql);
        
        // Vincula os parâmetros para evitar SQL Injection
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':tel' => $tel,
            ':mensagem' => $mensagem
        ]);

        echo "<script>alert('Dados guardados no Supabase!'); window.location.href='index.html';</script>";
    } catch (PDOException $e) {
        echo "Erro ao inserir dados: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <!-- Configurações de compatibilidade e viewport para responsividade -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sítio Santa Tereza</title>
    <!-- Importação do Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- Importação do CSS personalizado -->
    <link rel="stylesheet" href="Site.css">
</head>

<body>
    <!-- Script do Bootstrap Bundle (necessário para componentes interativos como navbar) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <!-- Barra de Navegação Principal -->
    <nav class="navbar navbar-expand-lg navbar-dark" aria-label="Navegação principal">
            <!-- Botão de alternância para mobile (hambúrguer) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links da navegação -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#Home" onclick="showpage('Home')">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#Sobre" onclick="showpage('Sobre')">Sobre</a></li>
                    <li class="nav-item"><a class="nav-link" href="#Nossos-produtos" onclick="showpage('Nossos-produtos')">Nossos produtos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#Contatos" onclick="showpage('Contatos')">Contatos</a></li>
                </ul>
            </div>
    </nav>
<main class="main-wraper">
        <!-- Seção Home: Introdução -->
        <section id="Home" class="page active">
            <h1>Bem-vindo ao Sítio Santa Tereza</h1>
            <p>Conheça nossos produtos e saiba mais sobre nossa história.</p>
        </section>

        <!-- Seção Sobre: Informações e Localização -->
        <section id="Sobre" class="page">
            <h2>Quem somos nós?</h2>
            <p>Somos uma empresa familiar, localizada em Venda Nova do Imigrante-ES. Todos os nossos produtos são
                produzidos em nossa propriedade e de forma artesanal. Venha nos visitar!</p>
            <div class="mapa">
                <!-- Mapa do Google Maps -->
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4476.977310141919!2d-41.1202845!3d-20.326348499999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xb98f9df1de5739%3A0xc33a5cf374cf7dfa!2sCacha%C3%A7a%20Alfredo%20Sossai!5e1!3m2!1spt-BR!2sbr!4v1755617972466!5m2!1spt-BR!2sbr"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                <!-- Vídeo Institucional -->
                <video controls>
                    <source src="videos/video-paisagem.mp4" type="video/mp4">
                </video>

                <img src="Imagens/foto_cafe.jpg" alt="Foto do café">
            </div>
        </section>

        <!-- Seção Nossos Produtos: Catálogo -->
        <section id="Nossos-produtos" class="page">
            <h2>Nossos Produtos:</h2>
            <div class="produtos">
                <!-- Produto 1 -->
                <div class="produto">
                    <p>Café em pó 500g</p>
                    <div class="caixa"><img src="Imagens/cafe1.jpg" alt="Café pó 500g"></div>
                </div>
                <!-- Produto 2 -->
                <div class="produto">
                    <p>Café em grão 500g</p>
                    <div class="caixa"><img src="Imagens/cafe2.jpg" alt="Café grão 500g"></div>
                </div>
                <!-- Produto 3 -->
                <div class="produto">
                    <p>Café especial 250g</p>
                    <div class="caixa"><img src="Imagens/cafe3.jpg" alt="Café pf"></div>
                </div>
                <!-- Produto 4 -->
                <div class="produto">
                    <p>Cachaça branca</p>
                    <div class="caixa"><img src="Imagens/cachaca1.jpg" alt="Cachaça branca"></div>
                </div>
                <!-- Produto 5 -->
                <div class="produto">
                    <p>Cachaça amarela</p>
                    <div class="caixa"><img src="Imagens/cachaca2.jpg" alt="Cachaça amarela"></div>
                </div>
            </div>
            <div class="tabela-precos"><a href="#tabela" onclick="showpage('tabela')">Veja nossa tabela de preços</a></div>
        </section>

        <!-- Seção Contatos: Formulário -->
        <section id="Contatos" class="page">
            <h2>Entre em Contato</h2>
            <form id="contato-form">
                <label for="nome">Nome:</label><input type="text" id="nome" name="nome" required>
                <label for="email">E-mail:</label><input type="email" id="email" name="email" required>
                <label for="telefone">Telefone:</label><input type="text" id="telefone" name="telefone"
                    placeholder="(99) 99999-9999">
                <label for="mensagem">Mensagem:</label><textarea id="mensagem" name="mensagem" required></textarea>
                <div class="termos-texto">
                    <label><input type="checkbox" id="termos"> Li e concordo com os <a href="seu_arquivo.html"
                            target="_blank" rel="noopener noreferrer">Termos de Uso</a></label>
                </div>
                <input type="submit" id="enviar" value="Enviar" disabled>
                <input type="reset" value="Limpar">
            </form>
            <button class="modo_de_cor" onclick="darkModeToggle()">Alternar Modo de cor</button>
        </section>
        <section id="tabela" class="page">
            <!-- Tabela de preços dos produtos -->
    <table border="1">
        <thead>
            <tr>
                <th>Produto</th> <!-- Cabeçalho da coluna de produtos -->
                <th>Valor</th>    <!-- Cabeçalho da coluna de valores -->
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="produto_nome">Café em pó 500g</td> <!-- Nome do produto -->
                <td class="produto_preco">42.50</td>        <!-- Valor do produto -->
            </tr>
            <tr>
                <td class="produto_nome">Café em grão 500g</td>
                <td class="produto_preco">42.50</td>
            </tr>
            <tr>
                <td class="produto_nome"   >Café em pó especial para moka e prensa francesa 250g</td>
                <td class="produto_preco">22.00</td>
            </tr>
            <tr>
                <td class="produto_nome">Cachaça branca</td>
                <td class="produto_preco">50.00</td>
            </tr>
            <tr>
                <td class="produto_nome">Cachaça amarela</td>
                <td class="produto_preco">55.00</td>
            </tr>
        </tbody>
    </table>
    <br>
    <!-- Título da seção de informações adicionais -->
    <h2>Mais informações sobre os produtos:</h2>
    <!-- Lista com descrições detalhadas dos produtos -->
    <ul>
        <li>Café em pó 500g: Nosso café em pó de 500g é cuidadosamente selecionado e torrado para oferecer um sabor rico e encorpado. Ideal para quem aprecia um café forte e aromático.</li>
        <li>Café em grão 500g: Para os amantes do café fresco,  nosso café em grão de 500g é a escolha perfeita. Moa na hora para garantir o máximo de sabor e aroma em cada xícara.</li>   
        <li>Café em pó especial para moka e prensa francesa 250g: Este café em pó especial de 250g é formulado para métodos de preparo como moka e prensa francesa, proporcionando uma experiência de café suave e equilibrada.</li>
        <li>Cachaça branca: Nossa cachaça branca é destilada com cuidado para preservar o sabor puro da cana-de-açúcar. Perfeita para coquetéis ou para ser apreciada pura.</li>    
        <li>Cachaça amarela: A cachaça amarela é envelhecida em barris de madeira, o que lhe confere um sabor mais complexo e suave. Ideal para quem busca uma bebida com caráter e tradição.</li>
    </ul>
        </section>
    </main>
    <!-- Rodapé -->
    <footer>
        <div class="footer-content">
            <p>Siga-nos nas redes sociais:</p>
            <ul>
                <li><a href="https://www.facebook.com/sitiosantaterezavni/?locale=pt_BR">Facebook</a></li>
                <li><a href="https://www.instagram.com/sitio_santa_tereza/">Instagram</a></li>
            </ul>
            <p>© 2025 Sítio Santa Tereza - Todos os direitos reservados.</p>
        </div>
    </footer>
    <script src="script.js"></script>
    <div id="imageModal" class="modal-zoom">
    <span class="fechar-modal">&times;</span>
    <img class="modal-conteudo" id="imgAmpliada">
    <div id="legenda"></div>
</div>
</body>

</html>