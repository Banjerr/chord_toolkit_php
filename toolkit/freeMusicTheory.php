<?php 
/* Program: freeMusicTheory.php
*  Desc: Contains the code for the limited/free application. It will construct 
*  an Object of the Key class depending on the variables POSTed to it.
*  It then computes what chords to display using functions of the Key Object and
*  displays these chords to the browser by including the "formatChordDisplay.php" script/program.
*  It also includes "formCode.php" so the user can select limited alternative keys/chords to display,
*  log into the application or register for access to the full application.
*/
include('Key.class.php');
include('checkUserLogged.php');

if (isset($_POST["myKey"])) 
{ 
	$userNote = $_POST["myKey"];
	$userTonality = $_POST["myTonality"];

	$userKey = new Key($userNote, $userTonality);

	$chordsToDisplay = $userKey->getKeyChordImages();
	$relativeChordsToDisplay = $userKey->getRelativeKeyChordImages();
}
?>
<html>
	<head>
		<title>Songwriting Chord Toolkit</title>
		<link rel = "stylesheet" href = "myStyle.css"/>
	</head>

	<body>
	
		<div id = 'content'>

			<?php 
			include("formCode.php"); 
			?>
		
			<div id = 'chords'></br>
				
				<?php 
				if (isset($_POST["myKey"])) 
				{ 
					include("formatChordDisplay.php");
				}
				?>
			</div>
		</div>
	</body>
</html>