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
                
            $total = 0;
            
            $checkoutProducts = array();
            
            $items = getCart();
            
            foreach ($items as $id) {
                $checkoutProducts[] = getProduct($id);
            }
            
          
            include '../includes/checkout.html.php';
            
        ?>   
        <form action ="Empty"type ="button" method ="post">
        <p><a class="btn btn-primary btn-lg btn-block" href="./index.php">Continue Shopping</a></p>
        <p><a class="btn btn-primary btn-lg btn-block" name = "Empty" value=" <?php echo emptyCart; ?>">Empty Cart</a></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="../index.php">Start Over</a></p>
        </form>
    </body>
</html>
