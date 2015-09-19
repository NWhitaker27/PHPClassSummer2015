<html>
    <?php
    $SESSION['user'] = "";
    $SESSION['pass'] = "";
    ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <title>Corporate Database</title>
    </head>
    <body>
    <center>
        <br/><br/><br/>
        <h3>ERROR: No Server Connection</h3>
        <br/><br/>
        Looks Like the servers are down.<br/><input class="btn btn-default btn-xs" type="button" value="Connect" onClick="location.href = '../index.php'"/>
    </center>
</body>
</html>
