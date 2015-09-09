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
            
    $db = dbconnect();
    
    $stmt = $db->prepare("SELECT * FROM products JOIN categories ON categories.category_id = products.category_id WHERE product_id = :product_id ");
    $product_id = filter_input(INPUT_GET, 'id');
    $binds = array(
        ":product_id" => $product_id,
        );
    
            $results = array();
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
            }
            
        ?>
        
        
        <table border="0">
            <thead>
                <tr>
                    <h2 class="text-center">Products</h2>
                </tr>
            </thead>
            <tbody class="text-center">
            <?php foreach ($results as $row): ?>
                <ul class="list-inline">
                   <li><?php echo $row['category']; ?></li>
                   <li><?php echo $row['product' ]; ?></li>        
                   <li>$<?php echo $row['price' ]; ?></li> 
                   <li><?php if ( empty($row['image']) ) : ?>
                    No Image
                <?php else: ?>
                    <img src="../../images/<?php echo $row['image']; ?>" width="125" height="100" />
                <?php endif; ?> </li>                  
                                   
                </ul>
            <?php endforeach; ?>
            </tbody>
        </table>
        <a href="view.php"> Go back </a>   
    </body>
</html>