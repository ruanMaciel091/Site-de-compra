<?php
include_once '../config/config.php';
session_start();
header('Content-Type: application/json; charset=utf-8');

// lê JSON do body
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!$data || !isset($data['nome'])) {
    echo json_encode(['ok' => false, 'msg' => 'Dados inválidos']);
    exit;
}

// garante o array de carrinho
if (!isset($_SESSION['carrinho']) || !is_array($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// procura produto pelo nome (ou usa outro identificador se tiver id)
$found = false;
foreach ($_SESSION['carrinho'] as &$item) {
    if ($item['nome'] === $data['nome']) {
        // atualiza quantidade (soma)
        $item['qtd'] = intval($data['qtd'] ?? 1);
        $found = true;
        break;
    }
}
unset($item);

if (!$found) {
    // adiciona o produto completo
    $_SESSION['carrinho'][] = [
        'nome' => $data['nome'],
        'preco' => floatval($data['preco'] ?? 0),
        'imagem' => $data['imagem'] ?? '',
        'qtd' => intval($data['qtd'] ?? 1)
    ];
}

// responde com o carrinho atualizado
echo json_encode(['ok' => true, 'carrinho' => $_SESSION['carrinho']]);