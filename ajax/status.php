<?php 

require_once '../networkstatus.class.php';
require_once '../config.php';

$networkstatus = new Networkstatus("");

$id = $_GET['id'];
$array;

// empty($id) retuns true :/
if($id != "" && $websites[$id] != null){
	$ping = $networkstatus->check($websites[$id]['domain'], $websites[$id]['port']);
	
	if($ping === null){
		$array = array("error" => false, "online" => false);
	}else{
		$array = array("error" => false, "online" => true, "ping" => $ping);
	}
}else{
	$array = array("error" => true, "message" => "website '{$id}' is not found");
}

echo json_encode($array);