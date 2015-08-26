<?php

function getOut()
{
if ( !isset($_SESSION['loggedin']) 
                || $_SESSION['loggedin'] === false 
            ) {
            //header('Location: passcode.php');
            //**die('Access not allowed');
    return false;
            }
            return true;
}
