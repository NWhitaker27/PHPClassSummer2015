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
        
        $product_id = "";
        $product_name = "";
        $price = "";
        $image = "";
        
        if ( isPostRequest() ) {
            
            //$category_id = filter_input(INPUT_POST, 'cat-id');
            $product_id = filter_input(INPUT_POST, 'prod-id');
            $product_name = filter_input(INPUT_POST, 'prod-name');
            $price = filter_input(INPUT_POST, 'pri-ce');
            $image = filter_input(INPUT_POST, 'ima-ge');
                        
                                   
            $stmt = $db->prepare("UPDATE products SET  product = :product, price = :price, image = :image WHERE product_id = :product_id");
            
            $binds = array(
                ":product_id" => $product_id,
                ":product" => $product_name,
                ":price" => $price,
                ":image" => $image,
            );
            
            $message = 'Update failed';
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
               $message = 'Update Complete';
            }
            
            
        } else {
            $product_id = filter_input(INPUT_GET, 'id');
        }
        
        $stmt = $db->prepare("SELECT * FROM products where product_id = :product_id");

        $binds = array(
             ":product_id" => $product_id
         );

         $result = array();
         if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            //$category_id = $category_id['category_id'];
            $product_name = $result['product'];
            //$price = $price['price'];
            //$image = $image['image'];
         } else {
             header('Location: view.php');
             die('ID not found');
             
         }
        
        
        ?>
        
        <p>
            <?php if ( isset($message) ) { echo $message; } ?>
        </p>
        
        <form class="form-group" method="post" action="#">            
            Product Name: <input type="text" name="prod-name" value="<?php echo $product_name ?>" />
            <br />
            Price: <input type="text" name="pri-ce" value="<?php echo $price ?>" />
            <br />
            Image: <input type="text" name="ima-ge" value="<?php echo $image ?>" />
            <br />
            <input type="hidden" name="prod-id" value="<?php echo $product_id ?>" />
            <input type="submit" value="Submit" />
        </form>
        
        <a href="view.php"> Go back </a>
        
    </body>
</html>

