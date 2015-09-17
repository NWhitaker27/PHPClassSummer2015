<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.css">
        <title></title>
    </head>
    <body>
        <?php

        include_once './functions/dbconnect.php';
        include_once './functions/dbdata.php';
        include_once './functions/until.php';        
        include_once '../index.php';
        
        
        
        $results = getAllTestData($columnsOrder, $orderBy);
?>
    <center>
        <br />
       <button class="btn btn-default" onClick="href='create.php'">Add New</button>
       <button class="btn btn-default" onclick="href='index.php'">Back</button>
       

        <table class="table">
            <thead>
                
            </thead>
         <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo $row['incorp_dt']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['owner']; ?></td>
                    <td><?php echo $row['zipcode']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><a href="read.php?id=<?php echo $row['id']; ?>">Read</a></td>
                    <td><a href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>            
                    <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>            
                </tr>
            <?php endforeach; ?>
            
        </table>

       <button class="btn btn-default" onClick="href='create.php'">Add New</button>
       <button class="btn btn-default" onclick="location.href='index.php'">Back</button>
    </center>
        <br/>
        
        
    </body>
</html>
