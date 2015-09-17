<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.css">
        <title></title>
    </head>
    <body>
        <?php
        
        include_once '../functions/dbconnect.php';
        include_once '/functions/dbdata.php';
        include_once '/functions/until.php'; 
        
        $db = getDatabase(); 
         
        $id = filter_input(INPUT_GET, 'id');
 
        $stmt = $db->prepare("SELECT * FROM corps WHERE id = :id");
        $binds = array(
                ":id" => $id
            );
        
        $results = array();
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            
         ?>

<table class="table">
            <thead><tr>
            <th><h3>Viewing <?php echo $results['corp']; ?></h3></th>
                </tr>
                <tr>
                    <th>Company</th>
                    <th>Date</th>
                    <th>Email</th>
                    <th>Zip Code</th>
                    <th>Owner</th>
                    <th>Phone</th>
                </tr>
            </thead>
        
            <tr>
                <td><?php echo $results['corp']; ?></td>
                <td><?php echo $results['incorp_dt']; ?></td>
                <td><?php echo $results['email']; ?></td>
                <td><?php echo $results['zipcode']; ?></td>
                <td><?php echo $results['owner']; ?></td>             
                <td><?php echo $results['phone']; ?></td>             
            </tr>
       
        </table>
        <br/><br/>
    
        <button class="btn btn-default" onClick="href='update.php'">Update</button>
        <button class="btn btn-default" onClick="href='delete.php'">Delete</button>
        <button class="btn btn-default" onclick="href='view.php'">Back</button>
   
    </body>
</html>
