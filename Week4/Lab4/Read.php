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
        
           include_once './functions/DBCorps.php';
           include './functions/functions.php';
            
           $db = DBCorps();
           
           $stmt = $db->prepare("SELECT * FROM corps WHERE id=:id");
           $id = filter_input(INPUT_GET, 'id');
           $binds = array(
               ":id" => $id
                ); 
            $results = array();
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
            }
            
        ?>
        
        
        <table border="0">
            <thead>
                <tr>
                    <h2>Company Name</h2>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $row): ?>
                <tr>
                   <td><?php echo $row['corp']; ?></td> 
                   <td><?php echo $row['incorp_dt']; ?></td> 
                   <td><?php echo $row['email']; ?></td> 
                   <td><?php echo $row['zipcode']; ?></td> 
                   <td><?php echo $row['owner']; ?></td>
                   <td><?php echo $row['phone']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <a href="view.php"> Go back </a>   
    </body>
</html>