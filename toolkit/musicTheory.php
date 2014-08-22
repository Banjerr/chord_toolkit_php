<?php 
/* Program: musicTheory.php
*  Desc: Contains the code for the main/full featured application. It checks the SESSION array 
*  to make sure that the visitor is logged in/authorised to access this page, if not, it redirects
*  to the home page. The HTML form allows the user access to all keys/chords in the DB. 
*  It will then construct an Object of the Key class depending on the variables POSTed to it.
*  It then computes what chords to display using functions of the Key Object and
*  displays these chords to the browser by including the "formatChordDisplay.php" script/program.
*  It also gives the User an option to log out.
*/
include('Key.class.php');

session_start();

if($_SESSION['auth'] != 'yes')
{
	header('Location: index.php');
	exit();
}

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
	<div id = 'contentFull'>

		<div id = 'musicFull'>
			
			<h2>Songwriting Chord Toolkit</h2>

			<form name="allKeyForm" action="musicTheory.php" method="POST">
				<fieldset>

					<legend>Keys and Chords</legend>

					<h3>Select Key for composition :</h3>

					<select name="myKey">
						<option value="C">C</option>
						<option value="Db">Db (C#)</option>
						<option value="D">D</option>
						<option value="Eb">Eb (D#)</option>
						<option value="E">E</option>
						<option value="F">F</option>
						<option value="F#">F# (Gb)</option>
						<option value="G">G</option>
						<option value="Ab">Ab (G#)</option>
						<option value="A">A</option>
						<option value="Bb">Bb (A#)</option>
						<option value="B">B</option>
					</select>

					<h3>Select Tonality of the Key:</h3>

					<select name="myTonality">
						<option value="major">Major</option>
						<option value="minor">Minor</option>
					</select>

					<input type='submit' value='Get Chords' />
				</fieldset>
			</form></br></br></br></br>

			<?php 
			echo '<h4>You are logged in as ' . $_SESSION['logName'] . '. <a href="logout.php">Log out</a></h4>';
			?>
		</div>

		<div id = 'logout'>

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