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
        
        
        $product = '';
        $price = '';
        $image = '';
        
        if ( isPostRequest() ) {
            
            $category_id = filter_input(INPUT_POST, 'cat-id');
            $product = filter_input(INPUT_POST, 'pro-duct');
            $price = filter_input(INPUT_POST, 'pri-ce');
            $image = filter_input(INPUT_POST, 'ima-ge');
                        
                                   
            $stmt = $db->prepare("UPDATE products SET  product = :product, price = :price, image = :image WHERE product_id = :product_id");
            
            $binds = array(
                ":product_id" => $product_id,
                ":product" => $product,
                ":price" => $price,
                ":image" => $image,
            );
            
            $message = 'Update failed';
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
               $message = 'Update Complete';
            }
            
            
        } else {
            $id = filter_input(INPUT_GET, 'product_id');
        }
        
        $stmt = $db->prepare("SELECT * FROM products where product_id = :product_id");

        $binds = array(
             ":product_id" => $product_id
         );

         $result = array();
         if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $category_id = $category_id['category_id'];
            $product = $product['product'];
            $price = $price['price'];
            $image = $image['image'];
         } else {
             header('Location: view.php');
             die('ID not found');
             
         }
        
        
        ?>
        
        <p>
            <?php if ( isset($message) ) { echo $message; } ?>
        </p>
        
        <form class="form-group" method="post" action="#">            
            Product Name: <input type="text" name="pro-duct" value="<?php echo $product ?>" />
            <br />
            Price: <input type="text" name="pri-ce" value="<?php echo $price ?>" />
            <br />
            Image: <input type="text" name="image" value="<?php echo $image ?>" />
            <br />
            <input type="hidden" name="cat-id" value="<?php echo $category_id ?>" />
            <input type="submit" value="Submit" />
        </form>
        
        <a href="view.php"> Go back </a>
        
    </body>
</html>

