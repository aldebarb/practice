<?php 
$string1 = "this is the first string.";
echo "<br>" . strtoupper($string1);
echo "<br>" . strtolower($string1);
echo "<br>" . ucfirst($string1);
echo "<br>" . ucwords($string1) . "<br>";

//split the following string
$string2 = '082307';
$stringTime = implode(':', str_split($string2, 2));
echo $stringTime;
//Or 
echo "<br>" . substr(chunk_split($string2, 2, ':'), 0, -1) . "<br>";

//Check if string is in another string
$string3 = "The monkey ate the taco.";
if (strpos($string3, "ate") !== false) {
	echo "<br>The word \"ate\" is inside the string: $string3<br>";
} else {
	echo "<br>The word \"ate\" is not inside the string: $string3<br>";
}

//Convert the value of a php variable to a string.
$value4 = 1000;
echo "<br> \$value4 is an " . gettype($value4);
$string4 = (string)$value4;
echo "<br> \$string4 is a " . gettype($string4) . "<br>";
//or create an if ($value4 === $string4){}

//Extract the file name from a string.
$string5 = "www.localhost.com/practice/index.php";
$slashPostion = strrpos($string5, "/");
$fileName5 = substr($string5, $slashPostion + 1);
echo "<br>" . $fileName5 . "<br>";

//Extract the username from the email
$email6 = "tacorobot@yahoo.com";
$atPosition = strpos($email6, "@");
$userName6 = substr($email6, 0, $atPosition);
echo "<br>Your username is $userName6 <br>";
//Or **note True returns before @, False returns after @**
echo "Another way is using strstr " . strstr($email6, "@", true) . "<br>";

//Get the last three characters of a string
$lastThree = substr($email6, -3);
echo "<br>$lastThree<br>";

//Format values in currency style
$value1 = 65.45;
$value2 = 104.35;
echo "<br>" . sprintf("%1.2f", $value1 + $value2) . "<br>";

//Generate simple random password without using rand() from a string
function randomPassword($characters)
{
$string9 = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
return substr(str_shuffle($string9), 0, $characters);
}
echo "<br>Random generated password is: " . randomPassword(25) . "<br>";

//Replace the first '' with '' in the string
$string10 = "the quick brown taco jumps over the lazy log";
/*
    str_replace() replaces every instance, you can't replace just once.
    echo "<br>" . str_replace("the", "That", $string10);
*/
echo "<br>" . preg_replace("/the/", "That", $string10, 1) . "<br>";

//Find the first character that is different between two strings
$stringCompare1 = "football";
$stringCompare2 = "footboll";
$stringPosition = strspn($stringCompare1 ^ $stringCompare2, "\0");
printf('First difference between two strings at position %d: "%s" vs "%s"', $stringPosition, $stringCompare1[$stringPosition], $stringCompare2[$stringPosition]);
printf("<br>");

//Put a string in an array.
$string12 = "Twinkle twinkle, little star,<br>
            How I wonder what you are<br>
            Up above the world so high,<br>
            Like a diamond in the sky.<br>";
$array12 = explode("<br>", $string12);
print_r($array12);
echo "<br>";

//Get the filename component of the following path
$string13 = "http://www.taco.com/practice/index.php";
$file13 = basename($string13, ".php");
echo "<br>$file13<br>";

//Write a script to print the next character of a specific character
function nextCharacter($letter) 
{
    ++$letter;
    if (strlen($letter) > 1) {
	    $letter = $letter[0];
    }
    return $letter;
}
echo "<br>" . nextCharacter("c");
echo "<br>" . nextCharacter("z") . "<br>";

//Remove a part of a string from the beginning
$email15 = "tacorobot@yahoo.com";
$atPosition15 = strpos($email15, "@");
$domainName = substr($email15, $atPosition15  + 1);
echo "<br>" . $domainName . "<br>";

//Specific part to remove
function removeSection($stringToRemove, $string)
{
	if (substr($string, 0, strlen($stringToRemove)) == $stringToRemove) {
		$string = substr($string, strlen($stringToRemove));
	}
	return $string;
}
echo removeSection('tacorobot@', $email15);

//Get a hex dump of a string
echo"<br>Hex dump of tacorobot@yahoo.com: " . bin2hex($email15) . "<br>";

//Insert a string at a specified postion.
$string17 = "If could talk.";
echo "<br>" . substr_replace($string17, ' tacos ', 3, 0) . "<br>";

//Get the first word of a sentence.
$string18 = "Burrito will make it better.";
$array18 = explode(" ", trim($string18));
echo "<br>$array18[0]<br>";

//Remove all leading zeroes from a string
$string19 = "000079542.25";
echo "<br>Remove 0's with (float) " . (float)$string19;
//also ltrim($var, "what to remove")
$string19 = "00008881259.66";
echo "<br>Remove 0's with ltrim() " . ltrim($string19, "0") . "<br>";

//Remove part of a string.
echo "<br>" . substr_replace($string18, "", 8, 4);
//Also
echo "<br>" . str_replace("will", " ", $string18) . "<br>";

//Remove trailing slash from a string.
$string21 = "Always keep a backslash at the end of a string////";
echo "<br>" . rtrim($string21, "/") . "<br>";

//Get the characters after the last "/"
$string22 = "http;//www.google.com/56498/taco";
$slashPosition = strrpos($string22, "/");
echo "<br>" . substr($string22, $slashPosition + 1);

//Replace multiple characters from a string.
$string23 = '\"\2+/6*6+--6+4/5:9:';
print_r(str_split('\\/:*?<>|+-'));
echo "<br>" . str_replace(str_split('\\/:*?"<>|+-'), ' ', $string23) . "<br>";

//Select the first 5 words from the following string
$string24 = "The taco saved the man's life from impending doom.";
echo "<br>" . implode(" ", array_slice(explode(" ", $string24), 0, 5)) . "<br>";

//Remove commas from a numeric string
$string25 = "3,159,357.66";
echo "<br>" . str_replace(",", "", $string25) . "<br>";
/*
    //Another way is to set
    $numeric = str_replace(",", "", $string25);
    //And check 
    if (is_numeric($numeric)) {}
*/

//Write a script to print letters from a to z
$letter26 = 'a';
while (strlen($letter26) < 2) {
	echo $letter26;
	++$letter26;
}
echo "<br>";
//Also ord() returns the value of a character
//     chr() returns a specific character
for ($i = ord('a'); $i <= ord('z'); $i++) {
	echo chr($i);
}
?>