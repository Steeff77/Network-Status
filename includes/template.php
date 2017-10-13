<head>
    <title>Network status</title>

    <meta property="og:title" content="Network Status"/>
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://static.itsstefan.eu"/>
    <meta property="og:image" content="https://static.itsstefan.eu/cdn/shot-20170125-12783-1n2t37b.jpeg"/>
    <meta property="og:description" content="Lookup the status of our websites and services!"/>

    <meta name="description" content="Lookup the status of our websites and services!">

	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.6/paper/bootstrap.min.css" rel="stylesheet">
    <link href="https://static.itsstefan.eu/cdn/css/bootstrap.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Feel free to use this domain for the style, it's CDN hosted, -->
    <link rel="icon" type="image/png" href="favicon.ico"/>
    <style>
        th, td {
            padding: 8px;
        }
        footer {
        text-align: center;
        }
    </style>
</head>
<div align="center">
    <h1>Network status</h1>
    All sites hosted at our network<br><br>
    <table>
        <tr>
            <td></td>
            <td>Status</td>
            <td>Ping</td>
        </tr>
        <?php foreach ($data as $key=>$website): ?>
            <tr>
                <td><?= $website['name'] ?></td>
				<td id="badge<?= $key ?>"><span class="label label-warning">Pinging...</span></td>
                <td id="ping<?= $key ?>"></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<footer>
    <p> &copy; Stefan &amp; Indra, <?= date('Y'); ?></p>
</footer>
<script>
window.onload = function(){
	var sites = <?= json_encode($data) ?>;
	
	for(item in sites){	
		$.ajax({
			type: "get",
			url: "ajax/status.php",
			data: "id=" + item,
			success: function(data){
				var json = JSON.parse(data);
				console.log(data);
				
				if(json == null || json.error == true){
					$("#badge" + json.id).html("<span class=\"label label-danger\">Error</span>");
					return;
				}
				
				if(json.online == true){
					$("#badge" + json.id).html("<span class=\"label label-success\">Online</span>");
					$("#ping" + json.id).html(json.ping + "ms");
				}else{
					$("#badge" + json.id).html("<span class=\"label label-danger\">Offline</span>");
					$("#ping" + json.id).html("");
				}
			}
		});
	}
}
</script>
