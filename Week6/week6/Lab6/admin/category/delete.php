<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <?php
        require_once '../../includes/session-start.req-inc.php';
        require_once '../../includes/access-required.html.php';
         
        include_once '../../functions/dbconnect.php';
        include_once '../../functions/category-functions.php';
        include_once '../../functions/products-functions.php';
        include_once '../../functions/until.php';
        
        $category_id = filter_input(INPUT_GET, 'id');
        
        $db = dbconnect();
           
        $stmt = $db->prepare("DELETE FROM categories WHERE category_id = :category_id");
           
        $binds = array(
             ":category_id" => $category_id
        );
           
        $isDeleted = false;
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $isDeleted = true;
        }         
        
        ?>
        
        <h1> Record <?php echo $category_id; ?>  
            <?php if ( !$isDeleted ): ?>Not<?php endif; ?> 
            Deleted
        </h1>
        
        <a href="<?php echo filter_input(INPUT_SERVER, 'HTTP_REFERER'); ?>"> Go back </a>
         
    </body>
</html>

