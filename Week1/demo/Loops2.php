<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table>
            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
            </tr>
            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
            </tr>
        </table>
        
        <table border="1">
            <?php/* first use the tr loop for the number of rows*/?>
        <?php for($tr = 1; $tr <= 10; $tr++):?>
            <tr>
                <?php/*put the loop for the data within the rows*/?>
                <?php for($td = 1; $td <= 30; $td++):?>
                <td>
                    <?php echo $td; ?>
                </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
        </table>
    </body>
</html>
