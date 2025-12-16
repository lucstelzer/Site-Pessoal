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
        
