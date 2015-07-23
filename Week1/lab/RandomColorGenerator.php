<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <table cellspacing="0">
            <?php/* first use the tr loop for the number of rows*/?>
        <?php for($tr = 1; $tr <= 10; $tr++):?>
            <tr>
                <?php/*put the loop for the data within the rows*/?>
                <?php for($td = 0; $td <= 30; $td++):?>
                <td style="background-color: <?php $randColor = '#'.strtoupper(dechex(rand(0x000000, 0xFFFAAA)));echo $randColor;?>">
                    <?php echo $randColor; ?>
                    <span style ="color:#FFF"> <?php echo $randColor?></span>
                </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
        </table>
        
    </body>
</html>
\