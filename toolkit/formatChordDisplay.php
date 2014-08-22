<?php
/* Program: formatChordDisplay.php
*  Desc: Contains the code for formatting/displaying the returned chord image references from the DB.
*  It also displays the chord symbol notation in Roman Numerals above the images.
*  This script is included both the free and main application where chords are displayed.
*/

$tab = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
$tabs = $tab . $tab;

echo '<p>Chords available in the Key of ' . $userKey->getKeyName() . '.</p>';

if ($userTonality == 'major')
{
	echo '<p>'. $tab . ' I' . $tabs . ' ii' . $tabs . 'iii' . $tabs . 'IV' . $tabs . 'V' . $tabs . 'vi' . $tabs . 'vii</p>';
}
else
{
	echo '<p>'. $tab . ' i ' . $tabs . 'ii' . $tabs . 'III' . $tabs . 'iv' . $tabs . 'v' . $tabs . 'VI' . $tabs . 'VII</p>';

}

for ($i=0; $i < sizeof($chordsToDisplay); $i++)
{  
	echo ('<img src="'.$chordsToDisplay[$i].'">');
} 

echo "</br></br></br>";

if ($userTonality == 'major')
{
	echo '<p>Chords available in the relative minor Key of ' . $userKey->getRelativeKeyName() . '.</p>' ;
	echo '<p>'. $tab . ' i' . $tabs . 'ii' . $tabs . 'III' . $tabs . 'iv' . $tabs . 'v' . $tabs . 'VI' . $tabs . 'VII</p>';
}
else
{
	echo '<p>Chords available in the relative major Key of ' . $userKey->getRelativeKeyName() . '.</p>' ;
	echo '<p>'. $tab . ' I'. $tabs . 'ii ' . $tabs . 'iii'. $tabs . 'IV'. $tabs . 'V'. $tabs . 'vi'. $tabs . 'vii</p>';
}


for ($i=0; $i < sizeof($relativeChordsToDisplay); $i++)  
{  
	echo ('<img src="'.$relativeChordsToDisplay[$i].'">');
} 

echo "</br></br>";
?>