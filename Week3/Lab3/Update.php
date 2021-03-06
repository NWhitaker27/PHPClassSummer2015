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
        
        include_once './DBCorps.php';
        include_once './functions.php';
        
        $db = DBCorps();
        
        $corp = '';
        $incorp_dt = '';
        $email = '';
        $zipcode = '';
        $owner = '';
        $phone = '';
        
        if ( isPostRequest() ) {
            
            $id = filter_input(INPUT_POST, 'i-d');
            $corp = filter_input(INPUT_POST, 'co-rp');
            $incorp_dt = filter_input(INPUT_POST, 'in-corp_dt');
            $email = filter_input(INPUT_POST, 'e-mail');
            $zipcode = filter_input(INPUT_POST, 'zip-code');
            $owner = filter_input(INPUT_POST, 'ow-ner');
            $phone = filter_input(INPUT_POST, 'p-hone');
            
                                   
            $stmt = $db->prepare("UPDATE corps SET corp = :corp, incorp_dt = CURDATE(), email = :email, zipcode = :zipcode, owner = :owner, phone = :phone WHERE id = :id");
            
            $binds = array(
                ":id" => $id,
                ":corp" => $corp,                
                ":email" => $email,
                ":zipcode" => $zipcode,
                ":owner" => $owner,
                ":phone" => $phone
            );
            
            $message = 'Update failed';
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
               $message = 'Update Complete';
            }
            
            
        } else {
            $id = filter_input(INPUT_GET, 'id');
        }
        
        $stmt = $db->prepare("SELECT * FROM corps where id = :id");

        $binds = array(
             ":id" => $id
         );

         $result = array();
         if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $corp =  $result['corp'];            
            $email =  $result['email'];
            $zipcode =  $result['zipcode'];
            $owner =  $result['owner'];
            $phone =  $result['phone'];
         } else {
             header('Location: view.php');
             die('ID not found');
             
         }
        
        
        ?>
        
        <p>
            <?php if ( isset($message) ) { echo $message; } ?>
        </p>
        
        
        <h1 class="text-center"><u>Update Company Information</u></h1>
        <form class="form-inline" method="post" action="#">
        <div class="text-center" class="form-group">
            Company Name: </br><input type="text" name="co-rp" value="<?php echo $corp ?>" />
            </br>
            Email: </br><input type="text" name="e-mail" value="<?php echo $email ?>" />
            </br>
            Zipcode: </br><input type="text" name="zip-code" value="<?php echo $zipcode ?>" />
            </br>
            Owner: </br><input type="text" name="ow-ner" value="<?php echo $owner ?>" />
            </br>
            Phone: </br><input type="text" name="p-hone" value="<?php echo $phone ?>" />
            </br>
            <input type="hidden" name="i-d" value="<?php echo $id ?>" />            
        </div></br>                      
            <p class="text-center"><input class="btn btn-primary btn-lg" type="submit" value="Submit" /></p>
        </form>
    <center>
        <a href="view.php" > Go back </a>
    </center> 
    </body>
</html>
    