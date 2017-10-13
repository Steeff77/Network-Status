<?php
declare(strict_types=1);

require_once __DIR__ . '/networkstatus.class.php';
require_once __DIR__ . '/config.php';

$networkstatus = new Networkstatus($template);

$data = array_map(function ($website) {
	global $networkstatus;
	
    return [
        'name' => $website['name'],
        'ping' => $networkstatus->check($website['domain'], $website['port'])
    ];
}, $websites);

$networkstatus->render($data);

