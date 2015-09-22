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
function createContact($newData)
    {
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO address SET user_id = :user_id, address_group_id = :address_group_id, fullname = :fullname, phone = :phone, website = :website, birthday = :birthday, image = :image ");
    $binds = array(
        ":user_id" => $newData[0],
        ":address_group_id" => $newData[1],
        ":fullname" => $newData[2],
        ":email" => $newData[3],
        ":address" => $newData[4],
        ":phone" => $newData[5],
        ":website" => $newData[6],
        ":birthday" => $newData[7],
        ":image" => $newData[8]
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0)
        {
        return true;
        }    
    return false;    
}  

function validation($newData)
{
    $errors = array();
    
 if (!isValidName($newData[2]))
    {
        $errors[] = 'Name is not valid, please try again.';
    }
    
    if ( filter_var($newData[3], FILTER_VALIDATE_EMAIL) === false ) 
    {
        $errors[] = 'Email address is not valid, please try again.';
    }
    
    if (!isValidPhone($newData[5]))
    {
        $errors[] = "Phone number is not valid, please try again.";
    }
    
    if ( filter_var($newData[6], FILTER_VALIDATE_URL) == false  )
    {
        $errors[] = "Website is not valid, please try again.";
    }
    
    return $errors;
}

//take spaces and non numeric characters out of phone number
function stripPhone($value)
{
    $value = preg_replace("/[^0-9]/", "", $value);
    $value = $value;
    return $value;
}
//ensures enough digits in phone
function isValidPhone($phone)
{
    $phone = stripPhone($phone);
    if ($phone > 1000000000 && $phone <9999999999)
    {
        return true;
    }
    else
    {
    return false;
    }
}
//formats phone so all are displayed the same way
function formatPhone($phone)
{
    $phoneRegex = '/^\(?([2-9]{1}[0-9]{2})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/';
    $newPhone = preg_replace( $phoneRegex, '($1) $2-$3' , $phone);
    return $newPhone;
}
//ensures name has no numbers or special chars
function isValidName($name)
{
    $nameRegex = '/^[A-Za-z\s]+$/';
    if (preg_match($nameRegex, $name))
    {
        return true;
    }
    else 
    {
        return false;
    }
}

function uploadImage() {
    
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
        
    } catch (RuntimeException $e) {
        echo $e->getMessage();
        /* There was an error */
        

    }
    
    return $imageName;    
    
}