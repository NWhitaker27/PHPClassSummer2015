<?php
/*
 * address_id
 * user_id
 * address_group_id
 * fullname
 * email
 * address
 * phone
 * website
 * birthday
 * image
 */
function createContact($address_id, $user_id, $address_group_id, $name, $email, $address, $phone, $web, $bday, $image)
    {
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO address SET address_id = :address_id, fullname = :fullname, email = :email, phone = :phone, website = :website, birthday = :birthday, image = :image ");
    $binds = array(
        ":address_id" => $address_id,
        ":fullname" => $name,
        ":email" => $email,
        ":phone" => $phone,
        ":website" => $web,
        ":birthday" => $bday,
        ":image" => $image
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0)
        {
        return true;
        }    
    return false;    
}  

function getAllContacts()
    {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM address JOIN address_groups WHERE address.address_group_id = address_groups.address_group_id ");
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
    }
    
    function getProduct($id) 
    {
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM address JOIN address_groups WHERE address.address_group_id = address_groups.address_group_id ");
     $binds = array(
        ":address_id" => $id );
    
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
    }     
    return $results;    
    }


function uploadNewAddressImage() {
    
    $imageName = "";
    
    try {

        // Undefined | Multiple Files | $_FILES Corruption Attack
        // If this request falls under any of them, treat it invalid.
        //upfile is what we named the file on the upload-form page
        if ( !isset($_FILES['upfile']['error']) || is_array($_FILES['upfile']['error']) ) {       
            throw new RuntimeException('Invalid parameters.');
        }

        // Check $_FILES['upfile']['error'] value.
        switch ($_FILES['upfile']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
        }

        // You should also check filesize here. 
        if ($_FILES['upfile']['size'] > 1000000) {
            throw new RuntimeException('Exceeded filesize limit.');
        }

        // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
        // Check MIME Type by yourself.
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $validExts = array(
                        'jpg' => 'image/jpeg',
                        'png' => 'image/png',
                        'gif' => 'image/gif',
                    );    
        $ext = array_search( $finfo->file($_FILES['upfile']['tmp_name']), $validExts, true );


        if ( false === $ext ) {
            throw new RuntimeException('Invalid file format.');
        }

        // You should name it uniquely.
        // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
        // On this example, obtain safe unique name from its binary data.

        $fileName =  sha1_file($_FILES['upfile']['tmp_name']); 
        $location = sprintf('../../images/%s.%s', $fileName, $ext); 

        if ( !move_uploaded_file( $_FILES['upfile']['tmp_name'], $location) ) {
            throw new RuntimeException('Failed to move uploaded file.'); 
        }

        /* File is uploaded successfully. */
        $imageName = $fileName . '.' . $ext;
        
    } catch (RuntimeException $ext) {

        /* There was an error */
        

    }
    
    return $imageName;    
    
}