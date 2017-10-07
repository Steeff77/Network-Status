<?php
declare(strict_types=1);

require_once __DIR__ . '/functions.php';

// Als je een nieuw domein / ip wilt toevoegen, voeg je hem gemakkelijk in via 'ip/domein',
$websites = [
    ['domain' => 'itsstefan.eu', 'port' => 80, 'name' => 'itsstefan.eu'],
    ['domain' => 'theindra.eu', 'port' => 80, 'name' => 'theindra.eu'],
];

$data = array_map(function ($website) {
    return [
        'name'   => $website['name'],
        'status' => check($website['domain'], $website['port']),
    ];
}, $websites);

render($data);

