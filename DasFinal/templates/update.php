<?php
        require_once 'includes/session-start.req-inc';
        require_once 'includes/access-required.html.php';
?>

<h1 class="cover-heading">Make An Update</h1>


<form method="post" action="?view=userdefault&user_view=read&view_address_id=<?php echo $_SESSION['currentAddress'];?>">
    <input type="submit" value="Return To View" class="btn btn-default" />
</form>

        
 <?php
 
        $addressToUpdate = getSelected($_SESSION['currentUserID'], $_SESSION['currentAddress']);
        $viewdate = date("m/d/Y", strtotime($addressToUpdate[0]['birthday']));
        $newAddressData = array();
        $addressGroups = getAddressGroups();
                
        if ( isPostRequest() ) {
            
            $newAddressData[0] = $_SESSION['currentUserID'];
            $newAddressData[1] = filter_input(INPUT_POST, 'selected_address_group');
            $newAddressData[2] = filter_input(INPUT_POST, 'fullname');
            $newAddressData[3] = filter_input(INPUT_POST, 'email');
            $newAddressData[4] = filter_input(INPUT_POST, 'address');
            $newAddressData[5] = formatPhone(stripPhone(filter_input(INPUT_POST, 'phone')));
            $newAddressData[6] = filter_input(INPUT_POST, 'website');
            $newAddressData[7] = filter_input(INPUT_POST, 'birthday');
            if (empty($newAddressData[7])){
                $newAddressData[7] = filter_input(INPUT_POST, 'old_birthday');
            }
            
            $errors = validation($newAddressData);
            
            if ( count($errors) == 0 ) 
            {                
                $newAddressData[8] = uploadImage();
                if ( empty($newAddressData[8]) ) {
                $newAddressData[8] = filter_input(INPUT_POST, 'old_image');
                $errors[] = 'Existing image retained';
                }
                
                if ( updateAddress($_SESSION['currentAddress'], $newAddressData[1], $newAddressData[2], $newAddressData[4], $newAddressData[3], $newAddressData[5], $newAddressData[6], $newAddressData[7], $newAddressData[8]) ) {
                    $results = 'Updated';
                } else {
                    $results = 'Update could not be completed';
                }
            }
            else
            {
                $results = 'Errors found';
            }
            
            
            
        }
        include 'includes/updateform.php';
        
        ?>

        <?php if ( isset($errors) && count($errors) > 0 ) : ?>
            <br>
            <ul>
                <?php foreach ($errors as $error): ?>
                <ul><?php echo $error; ?></ul>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

           