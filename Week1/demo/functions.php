<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /*random hex colors*/
        ?>
        <?php
        $str = 'hello';
        echo strtoupper($str);
        $randColor = '#'.strtoupper(dechex(rand(0x000000, 0xFFFFFF)));
        echo $randColor;
        ?>
    </body>
</html>
