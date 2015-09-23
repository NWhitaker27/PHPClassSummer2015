<?php
    require_once '/includes/session-start.req-inc';
    require_once '/includes/access-required.html.php';
    //echo $_SESSION['currentUserID'];
    $currentUserID = $_SESSION['currentUserID'];
 
    $userView = filter_input(INPUT_GET, 'user_view');
?>
<h1 class="cover-heading">Welcome To Address Box, <?php echo $_SESSION['currentUserEmail']; ?></h1>

<hr>

<?php

?>

<?php       
                if ( $userView === 'read' ) 
                {
                    //user view of detailed address info and update/delete access
                    include '/templates/read.php';
                } 
                else if (  $userView === 'update' ) 
                {
                    //user access to update item
                    include '/templates/update.php';
                }
                else if (  $userView === 'delete' ) 
                {
                    //user access to delete item
                    include '/templates/delete.php';
                }
                else
                {
                    /* Default view for full address book*/
                    include '/includes/addressDisplay.php';
                }
?>
