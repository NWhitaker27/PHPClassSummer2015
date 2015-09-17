<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.css">
        <title></title>
    </head>
    <body>
        <?php
 //connection to DB and functions       
            include_once '/functions/dbconnect.php';
            include_once '/functions/dbdata.php';
            include_once '/functions/until.php'; 
            
            $db = getDatabase();
 //delete using ID           
            $id = filter_input(INPUT_GET, 'id'); 
            $stmt = $db->prepare("DELETE FROM corps where id = :id");
            
            $binds = array(
                ":id" => $id
            );
//if deleted, success message       
        $isDeleted = false;
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $isDeleted = true;?>
    <center><b><h1> Record <?php echo $id; ?> Deleted</h1></b>
            <?php
        }  
        ?>
        
 <!-- unsuccessful -->      
        <?php if ( !$isDeleted ): ?> 
        <h1> Record <?php echo $id; ?> Not Deleted</h1>
        <?php endif; ?>
        
 <!-- navigation -->          
        <button class="btn btn-default" onclick="window.location.href='view.php'">Back</button></center>
    </body>
</html>