<?php

function check($domain, $port)
{
	$starttime = microtime(true);
    $file      = @fsockopen($domain, $port, $errno, $errstr, 01);
    $stoptime  = microtime(true);
    $status    = null;
    
    if (!$file) {
        $status = null; // Website is offline
    } else {
        fclose($file);
        $status = ($stoptime - $starttime) * 1000;
        $status = floor($status);
    }
    return $status;
}
$websites = array(
    'itsstefan.eu', // Als je een nieuw domein / ip wilt toevoegen, voeg je hem gemakkelijk in via 'ip/domein',
    'theindra.eu',
);
$poorten  = array(
// Als je een nieuw domein / ip hebt toegevoegd, moet je ook de juiste poort toevoegen (LETOP!) alle ports staan gelijk aan het lijstje boven ^ 
    80,
    80,
);
$namen    = array(
    'itsstefan.eu',
    'theindra.eu',
);
?>
<head>
<title>Network status</title>

<meta property="og:title" content="Network Status"/>
<meta property="og:type" content="website">
<meta property="og:url"   content="https://static.itsstefan.eu"/>
<meta property="og:image" content="https://static.itsstefan.eu/cdn/shot-20170125-12783-1n2t37b.jpeg"/>
<meta property="og:description" content="Bekijk de status van onze websites en services!" />

<meta name="description" content="Bekijk de status van onze websites en services!">

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.6/paper/bootstrap.min.css" rel="stylesheet">
<link href="https://static.itsstefan.eu/cdn/css/bootstrap.css" rel="stylesheet">
<link href="https://static.itsstefan.eu/cdn/css/starter-template.css" rel="stylesheet">
<link rel="icon" type="image/png" href="https://static.itsstefan.eu/cdn/favicon.ico" />
<style>
th, td {
    padding: 8px;
}
</style>
</head>
<div align="center">
<h1>Network status</h1>
All sites hosted at our network<br><br>
<table>
<tr><td></td><td>Status</td><td>Ping</td></tr>
<?php
    foreach (array_map(NULL, $websites, $poorten, $namen) as $all) {
        list($websites, $poorten, $namen) = $all;
		
		$check = check($websites, $poorten);
		
		

		
		if($check != null){
            echo '<tr><td>' . $namen . '</td> <td> <span class="label label-success">Online</span></td><td>' . $check . 'ms</td></tr>';
        } else {
            echo '<tr><td>' . $namen . '</td><td> <span class="label label-danger">Offline</span></td><td></td><td></td></tr>';
        }
    }
?>
</table>
</div>
<footer>
 <p> &copy; Stefan & Indra, <?= date('Y'); ?></p>
</footer>
