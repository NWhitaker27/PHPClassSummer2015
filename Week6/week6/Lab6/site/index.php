<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once '../includes/session-start.req-inc.php';
            require_once '../functions/cart-functions.php';
            require_once '../functions/dbconnect.php';
            require_once '../functions/until.php';
            require_once '../functions/category-functions.php';
            require_once '../functions/products-functions.php';
                        
            startCart();            
            
            $allCategories = getAllCategories();            
            $allProducts = getAllProducts();
            
            $categorySelected = filter_input(INPUT_GET, 'cat');
                if ($categorySelected != "")
                    {
                    $allProducts = getProductByCat($categorySelected);
                    
                    }
                    
                    
            $action = filter_input(INPUT_POST, 'action');
                       
            
            if ( $action === 'buy' ) {
                $productID = filter_input(INPUT_POST, 'product_id');
                addToCart($productID);
                
            }
            if ( $action === 'Empty cart' )
                {
                //Empty the $_SESSION['cart'] array                
                unset($_SESSION['cart']);
                emptyCart('Location: ?cart');
                exit();
                } 
                
           
            include_once '../includes/categories.html.php';
            include_once '../includes/products.html.php';
            
            
            
        ?>
        
        <p><a class="btn btn-primary btn-lg btn-block" href="./checkout.php">Check Out</a></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="../index.php">Start Over</a></p>
        
    </body>
</html>
