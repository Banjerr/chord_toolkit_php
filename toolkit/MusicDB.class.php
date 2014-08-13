<?php
/* Class: MusicDB.class.php
*  Desc: Class used for creating a MusicDB object. It describes all the attributes and functions necesarry
*  for connecting to, querying and returning data from the music theory DB. It is constructed with the parameters necessary to connect 
*  to the DB. An instance of this object will provide functionality to the Key class.
*/

class MusicDB
{
	public $myQuery;
	public $myNewConnection;

	public function __construct($host, $user, $password, $database)
	{
		$this->myNewConnection = mysqli_connect($host, $user, $password, $database);
	}

	public function getKeyChords($tonic, $tonality)
	{
		$this->myQuery = "SELECT * FROM " . $tonality . "_scale WHERE tonic='$tonic'" or die("Error...." . mysqli_error($myNewConnection));

		$result = $this->myNewConnection->query($this->myQuery);
		
		while($row = mysqli_fetch_row($result)) 
		{
    		$rows[] = $row;
    	}
		
		for ($i=0; $i < sizeof($rows) ; $i++)  
		{ 	
			//takes 2nd dimension of array and returns as single
    		for ($j=0; $j < (sizeof($rows, 1) - 1) ; $j++)  
    		{  
        		$musicArray[$j] = $rows[$i][$j]; 
    		} 
		} 

		return $musicArray;
  	}
	
	public function getRelativeKeyChords($tonic, $tonality)
	{
		if ($tonality == 'major')
		{
			$this->myQuery = "SELECT min.* FROM major_scale maj INNER JOIN minor_scale min ON min.tonic = maj.submediant WHERE  maj.tonic = '$tonic'" or die("Error...." . mysqli_error($myNewConnection));
		}
		else
		{
			$this->myQuery = "SELECT maj.* FROM major_scale maj, minor_scale min WHERE maj.tonic = min.mediant AND min.tonic = '$tonic'" or die("Error...." . mysqli_error($myNewConnection));
		}
		
		$result = $this->myNewConnection->query($this->myQuery);

		$row = mysqli_fetch_row($result);
		//only returning a single row, no while loop necessary, so same logic could also apply to getRelativeKeyChords above
		//see commented out code below
		return $row;
		/*while($row = mysqli_fetch_row($result)) 
		{
    		$rows[] = $row;
    	}
		//return $rows;
		for ($i=0; $i < sizeof($rows) ; $i++)  
		{ 
    		for ($j=0; $j < (sizeof($rows, 1) - 1) ; $j++)  
    		{  
        		$musicArray[$j] = $rows[$i][$j]; 
    		} 
 		} 

		return $musicArray;*/
	}
	
	public function displayChord($chord)
	{
		$this->myQuery = "SELECT image_path FROM chord_images WHERE chord_name = '$chord'"    or die("Error..." . mysqli_error($this->myNewConnection));
		
		$result = $this->myNewConnection->query($this->myQuery);
		
		$row = mysqli_fetch_assoc($result);
		//refernce for chord image file 
		return $row["image_path"];               
	}
}
?>