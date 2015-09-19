<html>
    <?php
    include './functions/dbconnect.php';   
    include './includes/dbError.php';    
    
    ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <title>Company Of Legends</title>
        <?php
        
        $results = array();
        $value = filter_input(INPUT_GET, 'search');
        if ($value == "searchData") {
            include './functions/searchData.php';
        }
        if ($value == "selectData") {
            include './functions/selectData.php';
        }
        ?>
    </head>
    
    <center>
        <div>
            <br/><br/><br/>            
            <h3>Corporate Database</h3>
            <center>
                <?php include'./includes/searchForm.php' ?>
                <?php include'./includes/selectForm.php' ?>
                <br/>
                <br/>
                <?php  include './functions/dbData.php'; ?>
            </center>
        </div>
    </center>
</body>
</html>
