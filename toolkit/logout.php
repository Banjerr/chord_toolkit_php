<?php
/* Program: logout.php
*  Desc: Contains the code for when a user wishes to log out.
*  If the user is logged in, it deletes the session variables and 
*  deletes the cookies setting expiration to an hour ago.
*  It then redirects to the home page.
*/

session_start();

if (isset($_SESSION['logName'])) 
{
    $_SESSION = array();
    
    if (isset($_COOKIE[session_name()])) 
    {
        setcookie(session_name(), '', time() - 3600);
    }
    
    session_destroy();
}

setcookie('user_id', '', time() - 3600);
setcookie('username', '', time() - 3600);

header('Location: index.php ');
?>
