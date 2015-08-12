<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Forms</title>
    </head>
    <body>
        <?php
        //$action = $_POST['action'] ***old way***
        $action = filter_input(INPUT_POST, 'action');
        
        if ($action === 'Submit1'){
            echo 'submitted from Form 1';
            }
        else {
            echo 'submitted from Form 2';
            }
            include './forms/form1.php';
            include './forms/form2.php';
        ?>
    </body>
</html>
