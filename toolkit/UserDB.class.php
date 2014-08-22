<?php
/* Class: UserDB.class.php
*  Desc: Class used for creating a UserDB object. It describes all the attributes and functions necesarry
*  for connecting to, querying and returning data from the music theory user DB. It is constructed with the 
*  parameters necessary to connect to the DB. An instance of this object will provide functionality to 
*  the "loginRegister.php" script/program, mainly a checkLogin and register function verifying user entered 
*  details against the DB.  
*/

class UserDB
{
	public $myQuery;
	public $myNewConnection;
	public $statusMessage;

	public function __construct($host, $user, $password, $database)
	{
		$this->myNewConnection = mysqli_connect($host, $user, $password, $database);
	}

	public function checkLogin($checkUserName, $checkPassword)
	{
		
		session_start();

		$this->statusMessage = "";
		
		if (!isset($_SESSION['logName'])) 
		{
			if (isset($_POST['submit'])) 
			{
				
				$userName = mysqli_real_escape_string($this->myNewConnection, trim($checkUserName));
				$password = mysqli_real_escape_string($this->myNewConnection, trim($checkPassword));

				if (!empty($userName) && !empty($password)) 
				{
					// Checks username and password against the database
					$this->myQuery = "SELECT user_id, user_name FROM musictheory_user WHERE user_name = '$userName' AND password = SHA('$password')" or die("Error...." . mysqli_error($myNewConnection));
					$result = mysqli_query($this->myNewConnection, $this->myQuery);

					if (mysqli_num_rows($result) == 1) 
					{
						// If a row exists, the log-in was successful 
					// set the auth and logName SESSION variabless, set some cookies(1 day) and redirect to the home page
						$row = mysqli_fetch_array($result);

						$_SESSION['auth'] = 'yes';
						$_SESSION['logName'] = $row['user_name'];
						setcookie('user_id', $row['user_id'], time() + (3600 * 24));
						setcookie('logName', $row['user_name'], time() + (3600 * 24));

						header('Location: musicTheory.php ');
					}
					else
					{
						$this->statusMessage = 'You must enter a valid UserName/Password, please try again.';
					}
				}
				else
				{
					$this->statusMessage = 'You must enter both Username/Password to Log in, please try again.';
				}
			}
		}
		else
		{
			$this->statusMessage = 'You are logged in as ' . $_SESSION['logName'] . '. <a href="logout.php">Log out</a>';
		}

		return $this->statusMessage;
	}



	public function register($regUserName, $regUserEmail, $regPasswordOne, $regPasswordTwo)
	{
		$this->statusMessage = "";
		
		$userName = mysqli_real_escape_string($this->myNewConnection, trim($regUserName));
		$userEmail = mysqli_real_escape_string($this->myNewConnection, trim($regUserEmail));
		$passwordOne = mysqli_real_escape_string($this->myNewConnection, trim($regPasswordOne));
		$passwordTwo = mysqli_real_escape_string($this->myNewConnection, trim($regPasswordTwo));

		if (!empty($userName) && !empty($userEmail) && !empty($passwordOne) && !empty($passwordTwo) && ($passwordOne == $passwordTwo))
		{
			// Check if username is already registered
			$this->myQuery = "SELECT * FROM musictheory_user WHERE user_name = '$userName'" or die("Error...." . mysqli_error($myNewConnection));
			$result = mysqli_query($this->myNewConnection, $this->myQuery);

			if (mysqli_num_rows($result) == 0)
			{
				//Check if email is already registered
				$this->myQuery = "SELECT * FROM musictheory_user WHERE user_email = '$userEmail'" or die("Error...." . mysqli_error($myNewConnection));
				$result = mysqli_query($this->myNewConnection, $this->myQuery);

				if (mysqli_num_rows($result) == 0)
				{
					// The username and email are both unique, so insert the data into the database
					$this->myQuery = "INSERT INTO musictheory_user (user_name, user_email, password) VALUES ('$userName', '$userEmail', SHA('$passwordOne'))" or die("Error...." . mysqli_error($myNewConnection));
					$result = mysqli_query($this->myNewConnection, $this->myQuery);
					
					$this->statusMessage = 'Account successfully created, please Log in.';

					return $this->statusMessage;
					exit();
				}
				else 
				{
					$this->statusMessage = 'An account already exists with this Email, please try another.';
				}
			}
			else 
			{
				$this->statusMessage = 'An account already exists with this Username, please try another.';
			}
		}
		else 
		{
			$this->statusMessage = 'Data must be entered correctly into all fields for registration, please try again.';
		}
		
		return $this->statusMessage;
	}
}
?>