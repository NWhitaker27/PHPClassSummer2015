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
           
           $results = getAllTestData();           
           $action = filter_input(INPUT_POST, 'action');
        
        if ( $action === 'search' ) {
            echo 'Search attempted';
            $column = filter_input(INPUT_POST, 'column');
            $search = filter_input(INPUT_POST, 'search');
           
           if ( !empty($column) && !empty($search) ) 
            {
               $results = searchTest($column, $search);
               }
               }
        if ( $action === 'sort' ) {
            echo 'submitted form 2';
            $column = filter_input(INPUT_POST, 'column');
            $sort = filter_input(INPUT_POST, 'sorted');
            var_dump($sort);
            } 
        
        //$results = getAllTestData(); 
           
           
           
            
        ?>
<form action="#" method="post">
    <fieldset>
        <legend>Form 1</legend>
        
        <label>search</label>  
        <input type="input" name="search" value="" />
       

        <label>Column selection</label>  
        <select name="column">
            <option value="dataone">dataone</option>
            <option value="datatwo">datatwo</option>
        </select>
        <input type="hidden" name="action" value="search" />
        <input type="submit" value="search" />
    </fieldset>    
</form>
        
        
<form action="#" method="post">
    <fieldset>
        <legend>Form 1</legend>
        
        <label>Sort By:</label>  
        <input type="radio" name="sorted" value="ASC" />Ascending
        <input type="radio" name="sorted" value="DESC" />Descending

        <label>Column selection</label>  
        <select name="column">
            <option value="dataone">dataone</option>
            <option value="datatwo">datatwo</option>
        </select>
        <input type="hidden" name="action" value="sort" />
        <input type="submit" value="Submit1" />
    </fieldset>    
</form>
        
        
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
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['dataone']; ?></td>
                    <td><?php echo $row['datatwo']; ?></td> 
                     </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
           
    </body>
</html>
