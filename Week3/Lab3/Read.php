<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>        
    </head>
    <body>
        <?php
        
           include_once './Corps.php';
           include './functions.php';
            
           $db = Corps();
           
           $stmt = $db->prepare("SELECT corp, incorp_dt FROM corps");
           
            $results = array();
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <a href="view.php"> Go back </a>   
    </body>
</html>