<head>
    <title>Network status</title>

    <meta property="og:title" content="Network Status"/>
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://static.itsstefan.eu"/>
    <meta property="og:image" content="https://static.itsstefan.eu/cdn/shot-20170125-12783-1n2t37b.jpeg"/>
    <meta property="og:description" content="Bekijk de status van onze websites en services!"/>

    <meta name="description" content="Bekijk de status van onze websites en services!">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.6/paper/bootstrap.min.css" rel="stylesheet">
    <link href="https://static.itsstefan.eu/cdn/css/bootstrap.css" rel="stylesheet">
    <!-- Feel free to use this domain for the style, it's CDN hosted, -->
    <link rel="icon" type="image/png" href="https://static.itsstefan.eu/cdn/favicon.ico"/>
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
        <tr>
            <td></td>
            <td>Status</td>
            <td>Ping</td>
        </tr>
        <?php foreach ($data as $website): ?>
            <?php if (null !== $website['ping']): ?>
                <tr>
                    <td><?= $website['name'] ?></td>
                    <td><span class="label label-success">Online</span></td>
                    <td><?= $website['ping'] ?>ms</td>
                </tr>
            <?php else: ?>
                <tr>
                    <td><?= $website['name'] ?></td>
                    <td><span class="label label-danger">Offline</span></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>
</div>
<footer>
    <p> &copy; Stefan &amp; Indra, <?= date('Y'); ?></p>
</footer>
