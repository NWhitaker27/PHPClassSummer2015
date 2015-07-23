<!DOCTYPE html>
<?php $myvar = 'hello';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo 'My Page Title'.$myvar;?></title>
    </head>
    <body>
        <h1>My Number is:
        <?php 
        $randNumber = rand(1,10);
        echo $randNumber;
        ?>
        </h1>
    </body>
</html>
