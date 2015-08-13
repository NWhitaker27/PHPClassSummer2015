<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
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

        <h1 class="text-center">Create New Company</h1>
        <form class="form-inline" method="post" action="#">
            <div class="text-center" class="form-group">
                <label class="sr-only" for="corp">Company Name</label>
                <input type="text" class="form-control" name="corp" id="corp" placeholder="Company Name">
            </div><br>
            <div class="text-center" class="form-group">
                <label class="sr-only" for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Email Address">
            </div><br>
            <div class="text-center" class="form-group">
                <label class="sr-only" for="zip">Zipcode</label>
                <input type="text" class="form-control" name="zipcode" id="zip" placeholder="Zipcode">
            </div><br>
            <div class="text-center" class="form-group">
                <label class="sr-only" for="owner">Owner</label>
                <input type="text" class="form-control" name="owner" id="owner" placeholder="Company Owner">
            </div><br>
            <div class="text-center" class="form-group">
                <label class="sr-only" for="Phone">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number">
            </div><br>
                      
            <p class="text-center"><input class="btn btn-primary btn-lg" type="submit" value="Submit" /></p>
        </form>
        
        <p class="text-center"><a href="view.php">View Data</a></p>
    </body>
</html>
