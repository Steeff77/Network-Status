<?php

require_once '../includes/networkstatus.class.php';
require_once '../config.php';

$networkstatus = new Networkstatus($protected);

$id = $_GET['id'];
$response = [
	$id => $id
];

if($protected['enabled'] && !isset($_SESSION['timestamp'])){
	$response = [
		'id' => $id,
		'error' => true,
		'message' => 'You have to be authenticated.'
	];
	echo json_encode($response);
	
	return;
}

if(is_numeric($id) && array_key_exists($id, $websites)) {
	$ping = $networkstatus->check($websites[$id]['domain'], $websites[$id]['port']);
	if($ping === null) {
		$response = [
			'id' => $id,
			'error' 	=> false,
			'online' 	=> false
		];
	} else {
		$response = [
			'id' => $id,
			'error' 	=> false,
			'online' 	=> true,
			'ping' 		=> $ping
		];
	}
} else {
	$response = [
		'id' => $id,
		'error' 	=> true,
		'online' 	=> false,
		'message' => 'Website ' . $id . ' could not be found.'
	];
}

echo json_encode($response);
