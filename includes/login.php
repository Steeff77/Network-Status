<?php 
$error = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	if($this->validatePassword($_POST['password'])){
		$_SESSION['timestamp'] = time();
		
		header("Refresh:0");
	}else{
		$error = true;
	}
}
?>
<head>
    <title>Network status</title>

    <meta property="og:title" content="Network Status"/>
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://static.itsstefan.eu"/>
    <meta property="og:image" content="https://static.itsstefan.eu/cdn/shot-20170125-12783-1n2t37b.jpeg"/>
    <meta property="og:description" content="Lookup the status of our websites and services!"/>
    <meta name="description" content="Lookup the status of our websites and services!"/>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <!-- Feel free to use this domain for the style, it's CDN hosted, -->
    <link rel="icon" type="image/png" href="favicon.ico"/>
	<style>
        footer {
			text-align: center;
        }
		#password {
			width: 200px;
		}
		#submit {
			width: 100px;
		}
    </style>
</head>
<div align="center">
    <h1>Network status</h1>
    Please login to view the network status<br><br>
	<form method="post" class="form-inline">
		<div class="form-group <?php if($error){ echo "has-error"; } ?>">
			<input id="password" placeholder="password" type="password" class="form-control has-error" name="password">
		</div>
		<input id="submit" type="submit" class="form-control">
	</form>
</div>
<footer>
    <p>Powered by, <a href="https://github.com/SupremeNL/Network-Status">Network-Status</a></p>
</footer>
