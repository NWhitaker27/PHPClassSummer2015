<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Address Box</title>
        

    </head>
    <body>
        <center>
        <?php
            require_once '/includes/session-start.req-inc';
            
            include_once '/functions/dbconnect.php';
            include_once '/functions/login-function.php';
            include_once '/functions/signupFunction.php';
            include_once '/functions/newContact-function.php';
            include_once '/functions/update.php';
            include_once '/functions/until.php'; 
            
                               
                $view = filter_input(INPUT_GET, 'view');
                if ( isPostRequest() ) {
                        $email = filter_input(INPUT_POST, 'email');
                        $password = filter_input(INPUT_POST, 'pass');
                        if ( isValidUser($email, $password) ) {
                            $_SESSION['isValidUser'] = true;
                            header('Location: index.php?view=userdefault');
                        } 
                        
                        else 
                        {
                            if ( !isset($_SESSION['isValidUser']) || $_SESSION['isValidUser'] !== true )
                            {
                            $results = 'Invalid Login. Sorry, please try again';
                            }
                        }
                    }
        ?>
        
    <nav>
        <ul>
                                                
        <?php            
            if ( isset($_SESSION['isValidUser']) &&  $_SESSION['isValidUser'] === true ) 
            {
                include './templates/links.php';
            }            
        ?>
        </ul>

    </nav>

    
    <div class="container">

      <div class="starter-template">
            <?php       
                if ( $view === 'add' ) 
                {
                    //add new item page
                    include '/templates/add.php';
                } 
                else if (  $view === 'update' ) 
                {
                    //update item page
                    include '/templates/update.php';
                }
                else if (  $view === 'delete' ) 
                {
                    //delete item page
                    include '/templates/delete.php';
                }
                else if (  $view === 'signup' ) 
                {
                    //new user sign up page
                    include '/templates/signup.php';
                }
                else if (  $view === 'userdefault' ) 
                {
                    //main user view page
                    include '/templates/userDefault.php';
                }
                else if (  $view === 'read' ) 
                {
                    //user view of detailed address info and update/delete access
                    include '/templates/read.php';
                }
                else
                {
                    /* Default view for log in or csignup*/
                    include '/templates/default.php';
                }
                ?>

                <?php 
                //output of success or error messages
                include '/includes/results.html.php'; 
                ?>
              
      </div>
    </div>
    </center>
    </body>
</html>
