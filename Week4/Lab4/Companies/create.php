<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.css">
        <title></title>
    </head>
    <body>
        <?php
//connecting to the database connection file and the fuctions file
            include_once '/functions/dbconnect.php';
            include_once '/functions/dbdata.php';
            include_once '/functions/until.php'; 
            
            $results = '';
            
//if data is submitted
            if (isPostRequest()) {
            
            $db = getDatabase();
            
            $stmt = $db->prepare("INSERT INTO corps SET corp = :corp, incorp_dt = NOW(), email = :email, zipcode = :zipcode, owner = :owner, phone = :phone");
//linking text box data with database data
                $corp = filter_input(INPUT_POST, 'corp');
                $email = filter_input(INPUT_POST, 'email');
                $zipcode = filter_input(INPUT_POST, 'zipcode');
                $owner = filter_input(INPUT_POST, 'owner');
                $phone = filter_input(INPUT_POST, 'phone');
        
            $binds = array(
                    ":corp" => $corp,
                    ":email" => $email,
                    ":zipcode" => $zipcode,
                    ":owner" => $owner,
                    ":phone" => $phone );
            
//displays 'data added' if data is added sucessfully
            if ($stmt->execute($binds)) {   
                $results = 'Data Added';
        ?>
    <center><b><h1><?php echo $results; ?></h1></b></center><br />
        <?php
        }} ?>
<!--data entry form-->
<center>
            <h3>Add New Listing</h3><br />
        <form class="form-group" method="post" action="#">
            
                Corporation: <input type="text" value="" name="corp" />
                <br /><br />
                Email: <input type="text" value="" name="email" />
                <br /><br />    
                Zip code: <input type="text" value="" name="zipcode" />
                <br /><br />
                Owner: <input type="text" value="" name="owner" />
                <br /><br /> 
                Phone: <input type="text" value="" name="phone" />
            <br/>
            <br/>
<!--submit data button-->
            <input class="btn btn-default" type="submit" value="Submit" /></form>
<!--link to all data in database table-->
            <button class="btn btn-default" onclick="window.location.href='index.php'">Back</button>
</center>
    </body>
</html>
