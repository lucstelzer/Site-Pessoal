document.addEventListener('DOMContentLoaded', function () {
            const termos = document.getElementById('termos');
            const enviar = document.getElementById('enviar');
            if (termos && enviar) {
                // Habilita/Desabilita o botão Enviar com base no checkbox de Termos
                termos.addEventListener('change', function () { enviar.disabled = !this.checked; });

                // Simula o envio do formulário
                enviar.form.addEventListener('submit', function (e) {
                    e.preventDefault(); // Evita o envio padrão (recarregamento)
                    alert('Formulário enviado com sucesso!');
                    enviar.form.reset();
                    enviar.disabled = true; // Desabilita o botão após o reset
                });
            }
        });

        // Função para alternar entre modo claro e escuro
        function darkModeToggle() {
            // Alterna a classe dark-mode no 'body' (pois as variáveis globais estão lá)
            if (document.body.classList.contains('dark-mode')) {
                document.body.classList.remove('dark-mode');
                localStorage.setItem('theme', 'light');
            } else {
                document.body.classList.add('dark-mode');
                localStorage.setItem('theme', 'dark');
            }
        }

        // Verifica o tema salvo no localStorage ao carregar a página
        document.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'dark') {
                document.body.classList.add('dark-mode');
            }
        });
        document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById("imageModal");
    const imgAmpliada = document.getElementById("imgAmpliada");
    const legendaTexto = document.getElementById("legenda");
    const spanFechar = document.getElementsByClassName("fechar-modal")[0];

    // Seleciona todas as imagens dentro das caixas de produtos
    const imagensProdutos = document.querySelectorAll('.caixa img');

    imagensProdutos.forEach(img => {
        img.style.cursor = "zoom-in"; // Muda o mouse para indicar que é clicável
        img.onclick = function() {
            modal.style.display = "block";
            imgAmpliada.src = this.src; // Pega o caminho da imagem clicada
            legendaTexto.innerHTML = this.alt; // Usa o texto alternativo como legenda
        }
    });

    // Fecha o modal ao clicar no X
    spanFechar.onclick = function() {
        modal.style.display = "none";
    }

    // Fecha o modal ao clicar fora da imagem
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});

function showpage(pageId) { 
    const pages = document.querySelectorAll('.page');
    pages.forEach(page => {
        if (page.id === pageId) {
            page.classList.add('active');
        } else {
            page.classList.remove('active');
        }
    });
}
