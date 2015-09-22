
<?php
/*
 * users
 * user_id
 * email
 * password
 */
function isValidUser( $email, $pass ) {
    
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email and password = :password");
    $pass = sha1($pass);
    $binds = array(
        ":email" => $email,
        ":password" => $pass        
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $resultsFromDB = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['currentUserID'] = $resultsFromDB[0]['user_id'];
        $_SESSION['currentUserEmail'] = $resultsFromDB[0]['email'];
        return true;
    }
     
    return false;
    
}