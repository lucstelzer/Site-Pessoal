<?php

require_once '../database/conn.php';

// Retorna JSON em todas as respostas
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método não permitido']);
    exit;
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$tel = trim($_POST['tel'] ?? '');
$mensagem = trim($_POST['mensagem'] ?? '');

if ($name === '' || $email === '' || $mensagem === '') {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Preencha os campos obrigatórios']);
    exit;
}

try {
    // Prepara a query SQL (use nomes de colunas iguais aos da sua tabela no Supabase)
    $sql = "INSERT INTO form (name, email, tel, mensagem) VALUES (:name, :email, :tel, :mensagem)";
    $stmt = $pdo->prepare($sql);
    
    // Vincula os parâmetros
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':mensagem', $mensagem);
    
    // Executa a query
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Formulário enviado com sucesso!']);
    } else {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Erro ao enviar o formulário.']);
    }
} catch (PDOException $e) {
    http_response_code(500);
    // Em produção, evite expor $e->getMessage(); aqui podemos logar em arquivo se necessário
    echo json_encode(['success' => false, 'message' => 'Erro na conexão.']);
}
