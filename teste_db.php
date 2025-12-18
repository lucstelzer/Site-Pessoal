<?php
// Este comando "puxa" as configurações que você fez no ficheiro de conexão
include_once 'database/conn.php'; 

// Verifica se a variável $pdo (que criamos no conn.php) existe e funciona
if (isset($pdo)) {
    echo "<h1>Sucesso!</h1>";
    echo "O seu site já consegue ligar-se ao Supabase.";
} else {
    echo "<h1>Erro!</h1>";
    echo "A conexão falhou. Verifique os dados no ficheiro database/conn.php.";
}
?>