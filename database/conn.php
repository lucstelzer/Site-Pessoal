<?php
$host = "db.ydcfgqdkhocsboptekgp.supabase.co";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$password = "@Luc@$2809";

try {
    // String de conexão para PostgreSQL
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    // Se chegar aqui, a conexão foi um sucesso
} catch (PDOException $e) {
    die("Erro ao conectar ao Supabase: " . $e->getMessage());
}
?>