<?php
declare(strict_types=1);

require_once __DIR__ . '/networkstatus.class.php';

// You can add new domains to the array by entering the domain/ip, port and public name
$websites = [
    ['domain' => 'itsstefan.eu', 'port' => 80, 'name' => 'itsstefan.eu'],
    ['domain' => 'theindra.eu', 'port' => 80, 'name' => 'theindra.eu'],
  //['domain' => '127.0.0.1', 'port' => 80, 'name' => 'nice name'],
];

// you can create your own templates and change the template which will be used here
$template = __DIR__ . "/template.php";
$networkstatus = new Networkstatus($template);

$data = array_map(function ($website) {
	global $networkstatus;
	
    return [
        'name' => $website['name'],
        'ping' => $networkstatus->check($website['domain'], $website['port'])
    ];
}, $websites);

$networkstatus->render($data);

