<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.css">
        <title></title>
    </head>
    <body>
    
    <center>
        <br />
        <h1>Corporation Database</h1><br /><br />
        
        <?php
//connecting to the database connection file
        include_once '/functions/dbconnect.php';
        include_once '/functions/dbdata.php';
        include_once '/functions/until.php'; 
        
        $action = filter_input(INPUT_POST, 'submit1');
        
        include './Companies/select.php';
        if ( $action === 'submit1' ) {
       
        echo 'submitted Order By';
        }
        
        ?>
        
        <h4>or...</h4>
        <br />
        
        <?php
        include './Companies/search.php';
        if ( $action === 'submit2' ) {
        $columnsOrder = filter_input(INPUT_GET, 'columnsOrder');
        echo 'submitted Selection';
        }
        ?>
    
        <table class="table">
            <thead><tr>
            <th><h3>Results</h3></th>
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
       
    </body>
</html>
