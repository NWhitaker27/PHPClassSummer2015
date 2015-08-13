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
        
           include_once './DBCorps.php';
           include './functions.php';
            
           $db = DBCorps();
           
           $stmt = $db->prepare("SELECT * FROM corps");
           
            $results = array();
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            
        ?>
        
        <a class="btn btn-primary btn-lg btn-block" href="create.php?id=<?php echo $row['id']; ?>">Add New Company</a> 
        <table border="0" class="table table-striped">
            <thead>
                <tr>
                    <h2>Company Name</h2>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['corp']; ?></td>                   
                    <td><a class="btn btn-primary" href="read.php?id=<?php echo $row['id']; ?>">Read</a></td>
                    <td><a class="btn btn-warning" href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>
                    <td><a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                                        
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
          
    </body>
</html>
