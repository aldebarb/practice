<?php  

function factorialOf($integer)
{
    if ($integer == 0) {
   	    $result = 0;
    } elseif ($integer > 0) {
    	$result = 1;
	    for ($factorial = 1; $factorial <= $integer; $factorial++) {
            $result *= $factorial;
        }
    }        
    return $result;
}
echo factorialOf(6);

//Check if Prime number
function checkIfPrime($integer) 
{
    if ($integer < 2) {
    	return false;
    }
	for ($divisor = 2; $divisor < $integer; $divisor++) {        
        if (($integer % $divisor) == 0) {
            return false;
        }
   	}
	return true;
}
echo "<br>";
if (checkIfPrime(27)) {
	echo "27 is a prime number";
} else {
	echo "27 is not a prime number";
}
echo "<br>";
if (checkIfPrime(11)) {
	echo "11 is a prime number";
} else {
	echo "11 is not a prime number";
}
echo "<br>";

//Reverse string
$sting = "The man walked over the moon.";

function reverseString($string)
{
	$length = strlen($string);
	$result = "";
	for ($x = 0; $x < $length; $x++) {
		$result .= $string{$length - $x - 1};
	}
	return $result;
}
var_dump(reverseString($sting));

//write a function to sort an array
function sortArray($array)
{
	for($x = 0; $x < count($array); ++$x) {
        $minimum = $x;
		for ($y = $x + 1; $y < count($array); ++$y) {
			if ($array[$y] < $array[$minimum]) {
		    	$temporary = $array[$minimum];
		    	$array[$minimum] = $array[$y];
		    	$array[$y] = $temporary;
		    }
		}
	}
	return $array;
}
echo"<br>";
$array = array(105, 10, 1, 'lmno', 24);
print_r(sortArray($array));

//function that checks if a string is all lowercase
function checkIfLowerCase($string) 
{
	$temporary = strtolower($string);
	if ($temporary == $string) {
		return true;
	}
	return false;
}
$lower = "string full of lower cases.";
if (checkIfLowerCase($sting)) {
	echo "<br>This string is all lowercase. - $sting";
} else {
	echo "<br>This String is not all lowercase. - $sting";
}
if (checkIfLowerCase($lower)) {
	echo "<br>This string is all lowercase. - $lower";
} else {
	echo "<br>This String is not all lowercase. - $lower";
}

//function that checks if a string is a palindrome
//even 0
//odd 1
function palindromeCheck($string)
{
	$string = strtolower(str_replace(' ', '', $string));
	$stringLength = strlen($string);
	if ($stringLength % 2 == 0) {
        $firstHalf = substr($string, 0, $stringLength / 2);
        $secondHalf = substr($string, $stringLength / 2, $stringLength);
	} elseif ($stringLength % 2 == 1) {
        $firstHalf = substr($string, 0, ($stringLength - 1) / 2);
        $secondHalf = substr($string, (($stringLength + 1) / 2), $stringLength);
	}
	if ($firstHalf == reverseString($secondHalf)) {
		return true;
	}
	return false;
}
if (palindromeCheck('Doom Mood')) {
	echo "<br>Doom Mood is a palindrome";
}
if (palindromeCheck('Taco time')) {
	echo "<br>Taco time is a palindrome";
} else {
	echo "<br>Taco time is not a palindrome";
}
if (palindromeCheck('a nut for a jar of tuna')) {
	echo "<br>a nut for a jar of tuna is a palindrome";
}
//A much easier way is
function checkPalindrome($string) 
{
	if ($string == strrev($string)) {
		return true;
	} else {
		return false;
	}
}
if (checkPalindrome('doom mood')) {
	echo "<br>Doom Mood is a palindrome";
}

?>