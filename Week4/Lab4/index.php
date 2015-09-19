<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <title>Company of Legends</title>

    </head>
    <body>
    
        
        <h1 class="text-center"><u>Company Database</u></h1></br></br>
    <?php
        
        include_once './functions/dbconnect.php';
        include_once './functions/dbData.php';
        include_once './functions/until.php';
        include './includes/selectForm.php';
    ?>
        <br>
    <?php
        include './includes/searchForm.php';
        $results = getDatabase();
        $action = filter_input(INPUT_GET, 'action');
        
        if ($action === 'sort')
        {
            $column = filter_input(INPUT_GET, 'sortBy');
            $order = filter_input(INPUT_GET, 'sortOrder'); //ASC or DESC
            $results = sortDatabase($column, $order);
        }
        if ($action === 'search') :
        
            $column = filter_input(INPUT_GET, 'searchColumn');
            $userSearch = filter_input(INPUT_GET, 'searchBy');
            $results = searchDatabase($column, $userSearch);
            $columnCount = count($results);
            if ($columnCount > 0) : ?>
            
                <br><h3><?php echo "Total Results: " . $columnCount; ?></h3>
            
            <?php else :
            
                echo "<h3>No results found</h3>"; endif;?>
                
         <?php endif; ?>      

               
        
        <br>       
        
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Company Name</th>
                    <th>Incorporation Date</th>
                    <th>Email</th>
                    <th>Zip Code</th>
                    <th>Owner</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo date("m/d/Y", strtotime($row['incorp_dt'])); ?></td> 
                    <td><?php echo $row['email']; ?></td> 
                    <td><?php echo $row['zipcode']; ?></td> 
                    <td><?php echo $row['owner']; ?></td> 
                    <td><?php echo $row['phone']; ?></td> 
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        <h3 class="text-center"> <a href="index.php">Search Again</a>  </h3> 
    </body>
</html>
