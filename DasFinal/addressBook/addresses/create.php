<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <?php
        
        require_once '../../includes/session-start.req-inc';
        require_once '../../includes/access-required.html.php';       
        include_once '../../functions/newAddress-function.php';
        include_once '../../functions/dbconnect.php';
        include_once '../../functions/until.php';
        
        
        $addressGroups = getAllContacts();
        
        if ( isPostRequest() )
            {
            $address_id = filter_input(INPUT_POST, 'address_id');            
            $name = filter_input(INPUT_POST, 'fullname');
            $email = filter_input(INPUT_POST, 'email');
            $phone = filter_input(INPUT_POST, 'phone');
            $web = filter_input(INPUT_POST, 'website');
            $bday = filter_input(INPUT_POST, 'birthday');
            $image = filter_input(INPUT_POST, 'image');
            
            $errors = array();
            
            if ( !isValidName($name) )
                {
                $errors[] = 'Name is not Valid';
                }
            if ( !isValidEmail($email) )
                {
                $errors[] = 'Email is not Valid';
                }
            if ( !isValidPhone($phone) )
                {
                $errors[] = 'Phone Number is not Valid';
                }
            if ( !isValidWebsite($web) )
                {
                $errors[] = 'Website Address is not Valid';
                }
            if ( !isValidBDay($bday) )
                {
                $errors[] = 'Birthday is not Valid';
                }
                
            if ( count($errors) == 0 ) 
                {                
                if ( empty ( $image )) {
                    $errors[] = 'image could not be uploaded';
                    }    
                
                if ( createContact($address_id, $user_id, $address_group_id, $name, $email, $address, $phone, $web, $bday, $image ) ) {
                    $results = 'New Contact Added';
                    } 
                else {
                    $results = 'Contact was not Added';
                    }
            
                }
            }
            ?>

        <h1>Add New Contact</h1>
        
        <?php if ( isset($errors) && count($errors) > 0 ) : ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>