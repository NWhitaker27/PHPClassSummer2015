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
           
           $stmt = $db->prepare("SELECT * FROM address");
           
            $results = array();
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            
        ?>
        
        <a class="btn btn-primary btn-lg btn-block" href="create.php?id=<?php echo $row['product_id']; ?>">Add New Product</a> 
        <table border="0" class="table table-striped">
            <thead>
                <tr>
                    <h2>Product Name</h2>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['product']; ?></td>                   
                    <td><a class="btn btn-primary" href="read.php?id=<?php echo $row['product_id']; ?>">Read</a></td>
                    <td><a class="btn btn-warning" href="update.php?id=<?php echo $row['product_id']; ?>">Update</a></td>
                    <td><a class="btn btn-danger" href="delete.php?id=<?php echo $row['product_id']; ?>">Delete</a></td>
                                        
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
          <p><a class="btn btn-primary btn-lg btn-block" href="../../index.php">Start Over</a></p>
    </body>
</html>


