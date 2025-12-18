// Função global para alternar entre as páginas da SPA
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

// Função global para alternar entre modo claro e escuro
function darkModeToggle() {
    if (document.body.classList.contains('dark-mode')) {
        document.body.classList.remove('dark-mode');
        localStorage.setItem('theme', 'light');
    } else {
        document.body.classList.add('dark-mode');
        localStorage.setItem('theme', 'dark');
    }
}

document.addEventListener('DOMContentLoaded', function () {
    // 1. Configuração do Formulário de Contato
    const form = document.getElementById('contato-form');
    const termos = document.getElementById('termos');
    const enviar = document.getElementById('enviar');

    if (termos && enviar) {
        termos.addEventListener('change', function () { 
            enviar.disabled = !this.checked; 
        });
    }

    if (form) {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const enviarBtn = document.getElementById('enviar');
            enviarBtn.disabled = true;
            
            const formData = new FormData(form);

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData
                });
                const data = await response.json();
                
                showFormMessage(data.success, data.message);
                
                if (data.success) {
                    form.reset();
                } else {
                    enviarBtn.disabled = false;
                }
            } catch (err) {
                showFormMessage(false, 'Erro ao enviar o formulário.');
                enviarBtn.disabled = false;
            }
        });
    }

    function showFormMessage(success, message) {
        let msg = document.getElementById('form-message');
        if (!msg) {
            msg = document.createElement('div');
            msg.id = 'form-message';
            msg.style.marginTop = '10px';
            form.parentNode.insertBefore(msg, form.nextSibling);
        }
        msg.textContent = message;
        msg.style.color = success ? 'green' : 'red';
        setTimeout(() => { msg.textContent = ''; }, 5000);
    }

    // 2. Configuração do Modal de Imagem (Zoom)
    const modal = document.getElementById("imageModal");
    const imgAmpliada = document.getElementById("imgAmpliada");
    const legendaTexto = document.getElementById("legenda");
    const spanFechar = document.querySelector(".fechar-modal");

    const imagensProdutos = document.querySelectorAll('.caixa img');
    imagensProdutos.forEach(img => {
        img.style.cursor = "zoom-in";
        img.onclick = function() {
            modal.style.display = "block";
            imgAmpliada.src = this.src;
            legendaTexto.innerHTML = this.alt;
        }
    });

    if (spanFechar) {
        spanFechar.onclick = () => { modal.style.display = "none"; };
    }

    window.onclick = (event) => {
        if (event.target == modal) { modal.style.display = "none"; }
    };

    // 3. Verificação do tema salvo
    if (localStorage.getItem('theme') === 'dark') {
        document.body.classList.add('dark-mode');
    }
});