<?php
/* File: index.php
*  Desc: Contains the code for the Toolkit home page.
*  It uses "checkUserLogged.php" and redirects to the main/full
*  featured application if necessary.
*  It also includes "formCode.php" allowing a visitor to try a
*  limited version of the application, log into the application or
*  register for access to the full application.
*/
include('checkUserLogged.php');
?>

<html>
	<head>
		<title>Songwriting Chord Toolkit</title>
		<link href='https://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
		<link rel = "stylesheet" href = "myStyle.css"/>
	</head>

	<body>

		<div id = 'content'>

			<?php
			include("formCode.php");
			?>
		</div>
	</body>
</html>
