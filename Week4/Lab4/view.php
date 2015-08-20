<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>        
    </head>
    <body>
        <?php
        
           include_once './functions/dbconnect.php';
           include_once './functions/dbData.php';
            
          /* $results = getAllTestData(); */
           
           $column = 'datatwo';
           $search = 'corps';
          $results = searchTest($column, $search);
            
        ?>
        
        
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data One</th>
                    <th>Data Two</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo $row['owner']; ?></td>
                    <td><?php echo $row['zipcode']; ?></td> 
                     </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
           
    </body>
</html>
