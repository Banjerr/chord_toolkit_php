<?php
/* Class: Key.class.php
*  Desc: Class used for creating a Key object. It describes all the attributes necessary 
*  for a musical Key to exist. It contains a function for constructing a musical Key based on
*  a root note and tonality. It uses a MusicDB object which provides funtionality for accessing the music theory DB.
*  This functionality allows the Key Class to implement it's own functions for setting the chords available in the key,
*  setting the chords available in the relative key, and for getting image references from the database that can be then used
*  outside the class to present the chord images.
*/
include('MusicDB.class.php');


class Key
{
	private $root;
	private $tonality;
    private $tonic;
	private $relativeKey;
	private $keyChords = array();
	private $relativeKeyChords = array();
	
    public function __construct($note, $tonality) 
    {
        global $keyMusicDB;
        include('dbConfig.php');
        
        $this->keyMusicDB = new MusicDB($host, $user, $password, $database);
        $this->tonality = $tonality;
        
    	if ($tonality == "minor") 
    	{

            switch ($note) 
            {
                case 'Db':
                    $this->root = 'C#';
                    break;

                case 'Eb':
                    $this->root = 'D#';
                    break;

                case 'Ab':
                    $this->root = 'G#';
                    break;
                    
                default:
                    $this->root = $note;
                    break;
            }

            $this->tonic = $this->root ."m";   
        } 
        else
        {
            $this->root = $note;
            $this->tonic = $this->root;
        }   
    	
    	
        $this->setKeyChords();
        $this->setRelativeKeyAndChords();
    }

    public function setKeyChords()
    {
        $this->keyChords = $this->keyMusicDB->getKeyChords($this->tonic, $this->tonality);
    }
    
    public function setRelativeKeyAndChords()
    {
        $this->relativeKeyChords = $this->keyMusicDB->getRelativeKeyChords($this->tonic, $this->tonality);
        $this->relativeKey = $this->relativeKeyChords[0];
    }

    public function getKeyChordImages()
    {
       for ($i=0; $i < sizeof($this->keyChords); $i++)  
        {  
            $chordImages[$i] = $this->keyMusicDB->displayChord($this->keyChords[$i]); 
        } 

        return $chordImages;
    }

    public function getRelativeKeyChordImages()
    {
        for ($i=0; $i < sizeof($this->relativeKeyChords); $i++)  
        {  
            $relativeChordImages[$i] = $this->keyMusicDB->displayChord($this->relativeKeyChords[$i]); 
        } 

        return $relativeChordImages;
    }
    
    public function getKeyName()
    {
        return $this->root . ' ' . $this->tonality;
    }
    
    public function getRelativeKeyName()
    {
        return $this->relativeKey;
    }
}
?>