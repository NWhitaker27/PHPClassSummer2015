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
        
        include_once '../../functions/dbconnect.php';
        include_once '../../functions/category-functions.php';
        include_once '../../functions/until.php';
        
        $db = dbconnect();
        
        $category_id = "";
        $category_name = "";
        
        if ( isPostRequest() ) {
            
            $category_id = filter_input(INPUT_POST, 'cat-id');
            $category_name = filter_input(INPUT_POST, 'cat-name');
                        
                                   
            $stmt = $db->prepare("UPDATE categories SET  category = :category WHERE category_id = :category_id");
            
            $binds = array(
                ":category" => $category_name,
                ":category_id" => $category_id,
                
            );
            
            $message = 'Update failed';
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
               $message = 'Update Complete';
            }
            
            
        } else {
            $category_id = filter_input(INPUT_GET, 'id');
        }
        
        $stmt = $db->prepare("SELECT * FROM categories where category_id = :category_id");

        $binds = array(
             ":category_id" => $category_id
         );

         $result = array();
         if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $category_name = $result['category'];
            
         } else {
             header('Location: view.php');
             die('ID not found');
             
         }
        
        
        ?>
        
        <p>
            <?php if ( isset($message) ) { echo $message; } ?>
        </p>
        
        <form class="form-group" method="post" action="#">            
            Category Name: <input type="text" name="cat-name" value="<?php echo $category_name ?>" />
            <br />
            <input type="hidden" name="cat-id" value="<?php echo $category_id ?>" />
            <input type="submit" value="Submit" />
        </form>
        
        <a href="view.php"> Go back </a>
        
    </body>
</html>

