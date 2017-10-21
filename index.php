<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/networkstatus.class.php';
require_once __DIR__ . '/config.php';

$networkstatus = new Networkstatus($protected, $template);

$data = array_map(function ($website) {
	global $networkstatus;
	
    return [
        'name' => $website['name'],
    ];
}, $websites);

$networkstatus->render($data);

