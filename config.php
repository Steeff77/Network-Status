<?php 

// You can add new domains to the array by entering the domain/ip, port and public name
$websites = [
    ['domain' => 'itsstefan.eu', 'port' => 80, 'name' => 'itsstefan.eu'],
    ['domain' => 'theindra.eu', 'port' => 80, 'name' => 'theindra.eu'],
  //['domain' => '127.0.0.1', 'port' => 80, 'name' => 'nice name'],
];

// If you enable protected you need to enter a password to see your network status
$protected = [
	"enabled" => true,
	"type" => 'bcrypt', // ("bcrypt" or "plain")
	"password" => '$2y$10$FbzYHRgfnp7KI.eD3Mw38.HbEWphDmnA6lEQuOYtwXhYmWfff/LBq', // your password (if type isn't plain then enter the hash)
	"template" => __DIR__ . "/includes/login.php"
];

// you can create your own templates and change the template which will be used here
$template = __DIR__ . "/includes/template.php";

?>