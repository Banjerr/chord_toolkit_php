<?php
/* Program: checkUserLogged.php
*  Desc: Contains the code for checking the $_SESSION array to 
*  see if a user is already logged in and redirects them to the 
*  main application page if so. If not, the code will attempt to 
*  log the user in via cookies if they are set. 
*/

if ((isset($_SESSION['auth'])) && ($_SESSION['auth'] == 'yes')) 
{
	header('Location: musicTheory.php');
	exit();
}
else if (!isset($_SESSION['auth'])) 
{
	if (isset($_COOKIE['user_id']) && isset($_COOKIE['logName'])) 
	{
		session_start(); 
		$_SESSION['logName'] = $_COOKIE['logName'];
		$_SESSION['auth'] = 'yes';
		header('Location: musicTheory.php');
		exit();
	}
}
?>