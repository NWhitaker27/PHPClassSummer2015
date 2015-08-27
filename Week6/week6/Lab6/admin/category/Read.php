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
        include_once '../../functions/products-functions.php';
        include_once '../../functions/until.php';
            
    $db = dbconnect();
    
    $stmt = $db->prepare("SELECT * FROM categories WHERE category_id = :category_id");
    $category_id = filter_input(INPUT_GET, 'id');
    $binds = array(
        ":category_id" => $category_id,
        );
    
            $results = array();
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
            }
            
        ?>
        
        
        <table border="0">
            <thead>
                <tr>
                    <h2>Product Categories</h2>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $row): ?>
                <tr>
                   <td><?php echo $row['category']; ?></td>                                     
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <a href="view.php"> Go back </a>   
    </body>
</html>