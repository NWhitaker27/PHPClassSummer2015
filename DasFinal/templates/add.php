<?php
        require_once '/includes/session-start.req-inc';
        require_once '/includes/access-required.html.php';
        
?>
<h1 class="cover-heading">Add New Item To Address Book</h1>

<br>


<?php
        $addressGroups = getAddressGroups();
        $newAddressData = array();
                
        if ( isPostRequest() ) {
            
            $newAddressData[0] = $_SESSION['currentUserID'];
            $newAddressData[1] = filter_input(INPUT_POST, 'selected_address_group');
            $newAddressData[2] = filter_input(INPUT_POST, 'fullname');
            $newAddressData[3] = filter_input(INPUT_POST, 'email');
            $newAddressData[4] = filter_input(INPUT_POST, 'address');
            $newAddressData[5] = formatPhone(stripPhone(filter_input(INPUT_POST, 'phone')));
            $newAddressData[6] = filter_input(INPUT_POST, 'website');
            $newAddressData[7] = filter_input(INPUT_POST, 'birthday');
            
            
            
            $errors = validation($newAddressData);
            
            if ( count($errors) == 0 ) 
            {                
                $newAddressData[8] = uploadImage();
                if ( empty($newAddressData[8]) ) {
                $errors[] = 'Image could not be uploaded';
                $results = 'Empty Image';
                }
                
                if ( createContact($newAddressData) ) {
                    $results = 'New item added to address book';
                } else {
                    $results = 'Item was not Added';
                }
            }
            else
            {
                $results = 'Errors found';
            }
            
        }
        ?>

        <?php if ( isset($errors) && count($errors) > 0 ) : ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                <ul><?php echo $error; ?></ul>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
 
<?php
        include '/includes/addForm.php';
?>

