<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include './DBCorps.php';
        include './functions.php';
        $results = '';
        if (isPostRequest()) {
            $db = DBCorps();
            /*
             * Notice we use the now function from MySql to add the date and time to the date column.  
             * The date column is a varchar but can also be a datetime format
             */
            $stmt = $db->prepare("INSERT INTO corps SET corp = :corp, incorp_dt = curDate(), email = :email, zipcode = :zipcode, owner = :owner, phone = :phone");
            $corp = filter_input(INPUT_POST, 'corp');
            $incorp_dt = filter_input(INPUT_POST, 'incorp_dt');
            $email = filter_input(INPUT_POST, 'email');
            $zipcode = filter_input(INPUT_POST, 'zipcode');
            $owner = filter_input(INPUT_POST, 'owner');
            $phone = filter_input(INPUT_POST, 'phone');
            $binds = array(
                ":corp" => $corp,
                ":email" => $email,
                ":zipcode" => $zipcode,
                ":owner" => $owner,
                ":phone" => $phone
            );
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Data Added';
            }
        }
        ?>


        <h1><?php echo $results; ?></h1>

        <h1>Create New Company</h1>
        <form method="post" action="#">            
           Company Name: <input type="text" name="corp" value="" />
            <br />
            Email: <input type="text" name="email" value="" />
            <br />
            Zipcode: <input type="text" name="zipcode" value="" />
            <br />
            Owner: <input type="text" name="owner" value="" />
            <br />
            Phone Number: <input type="text" name="phone" value="" />
            <br />
           
            <input type="submit" value="Submit" />
        </form>
        
        <p><a href="view.php">View Data</a></p>
    </body>
</html>
