<head>
	
    <title>Network status</title>
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="Network Status"/>
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://itsstefan.eu/network-status/"/>
    <meta property="og:image" content="https://static.itsstefan.eu/cdn/shot-20170125-12783-1n2t37b.jpeg"/>
    <meta property="og:description" content="Lookup the status of our websites and services!"/>
    <meta name="description" content="Lookup the status of our websites and services!"/>
    
    <!-- Feel free to use this domain for the style, it's CDN hosted, -->
    <link rel="stylesheet" href="https://static.itsstefan.eu/cdn/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://static.itsstefan.eu/cdn/bootstrap/css/bootstrap-theme.min.css">
	
    <script src="https://static.itsstefan.eu/cdn/bootstrap/js/jquery.min.js"></script>
    <link rel="icon" type="image/ico" href="https://static.itsstefan.eu/cdn/favicon.ico" />
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
				<td id="badge<?= $key ?>"><span class="badge badge-warning">Pinging...</span></td>
                <td id="ping<?= $key ?>"></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<footer>
    <p>Powered by, <a href="https://github.com/SupremeNL/Network-Status">Network-Status</a></p>
</footer>
<script>
$(document).ready(function() {
  var sites = <?= json_encode($data) ?>;
	
  for(item in sites){	
    $.ajax({
      type: "get",
      url: "ajax/status.php",
      data: "id=" + item,
      success: function(data){
        var json = JSON.parse(data);				
	
	if (json == null || json.error == true){
	  $("#badge" + json.id).html("<span class=\"badge badge-danger\">Error</span>");
	  return;
	}
				
	if (json.online === true){
	  $("#badge" + json.id).html("<span class=\"badge badge-success\">Online</span>");
	  $("#ping" + json.id).html(json.ping + "ms");
	} else {
	  $("#badge" + json.id).html("<span class=\"badge badge-danger\">Offline</span>");
	  $("#ping" + json.id).html("");
	}
      }
   });
 }
});
</script>
