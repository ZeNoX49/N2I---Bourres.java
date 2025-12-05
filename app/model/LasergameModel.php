<?php

$file = __DIR__ . '/scores.json';

header('Content-Type: app/json; charset=utf-8');

$raw = file_get_contents('php://input');
$data = json_decode($raw, true);

if (!$data || !isset($data['name'], $data['score'])) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Données invalides']);
    exit;
}

$name  = substr(trim($data['name']), 0, 20);
$score = (int)$data['score'];

$scores = [];
if (file_exists($file)) {
    $json = file_get_contents($file);
    $scores = json_decode($json, true) ?: [];
}

$scores[] = [
    'name'  => $name,
    'score' => $score,
];

usort($scores, function ($a, $b) {
    return $b['score'] <=> $a['score'];
});
$scores = array_slice($scores, 0, 20);

// sauvegarde
file_put_contents($file, json_encode($scores, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

echo json_encode(['status' => 'ok', 'scores' => $scores]);
