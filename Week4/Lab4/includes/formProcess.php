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
            include './includes/formSelect.php';
            include './includes/formSearch.php';
        ?>
    </body>
</html>