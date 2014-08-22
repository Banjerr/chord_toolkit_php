<?php
/* File: formCode.php
*  Desc: Contains the code for the Web pages that display three HTML forms.
*  There is a music Key selection form, a login form, and a registration form.
*  Upon user selction/submission, these forms POST the relevant information to 
*  the relevant pages/programs. 
*/
?>

<div id = 'music'>
	
	<h2>Songwriting Chord Toolkit</h2>
	
	<h4>(Please Login or Register to access all Keys) </h4>
	
	<form name="keyForm" action="freeMusicTheory.php" method="POST">
		
		<fieldset>
			<legend>Keys and Chords</legend>
			
			<h3>Select Key for composition :</h3>
			
			<select name="myKey">
				<option value="C">C</option>
				<option value="F#">F# (Gb)</option>
				<option value="Bb">Bb (A#)</option>
			</select>
			
			<h3>Select Tonality of the Key:</h3>
			
			<select name="myTonality">
				<option value="major">Major</option>
				<option value="minor">Minor</option>
			</select>

			<input type='submit' value='Get Chords' />
		</fieldset>
	</form>
</div>

<div id = 'login'>

	<h3>Toolkit - Log In</h3>
	
	<form name="logInForm" action="loginRegister.php" method="POST">
		
		<fieldset>
			<legend>Log In</legend>
			
			<label for="username">Username:</label>
			<input type="text" name="username"/><br/>
			
			<label for="password">Password:</label>
			<input type="password" name="password"/>
		</fieldset>
		
		<input type="submit" value="Log in" name="submit"/>
	</form>

	<h3>Toolkit - Register</h3>
	
	<form name="registerForm" action="loginRegister.php" method="POST">
		
		<fieldset>
			<legend>Registration Info</legend>
			
			<label for="username">Username:</label>
			<input type="text" id="username" name="username"/><br />

			<label for="email">Email Address:</label>
			<input type="text" id="email" name="email"/><br />

			<label for="password1">Password:</label>
			<input type="password" id="password1" name="password1"/><br />
			
			<label for="password2">Password (retype):</label>
			<input type="password" id="password2" name="password2"/><br />
		</fieldset>
		
		<input type="submit" value="Register" name="submit" />
	</form>
</div>