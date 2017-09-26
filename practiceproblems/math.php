<?php 
//Find the maximum and minimum from 3 arrays
$array1 = array(360,300,310,340,350,375,500,111);
$array2 = array(350,390,300,300,250,150, 20);
$array3 = array(630,700,900,120, 1000);
$arrayMerge = array_merge($array1, $array2, $array3);
$minimum = $arrayMerge[0];
$maximum = $arrayMerge[0];
foreach ($arrayMerge as $key => $value) {
	if ($value < $minimum) {
		$minimum = $value;
	}
	if ($value > $maximum) {
		$maximum = $value;
	}
}
echo "The minimum is: $minimum";
echo "<br>The maximum is: $maximum<br>";
//Another way is using min() and max()
$min = min(min($array1), min($array2), min($array3));
$max = max(max($array1), max($array2), max($array3));
echo "Using min() and max() - $min and $max<br>";

//Round to 1 decimal digit and so on
echo "<br>152.156 rounded to tenth: " . round(152.156, 1);
echo "<br>152.156 rounded to hundredth: " . round(152.156, 2);
echo "<br>152.156 rounded to thousandth: " . round(152.156, 3) . "<br>";

//Generate a random string of 11 letters and numbers.
function randomString($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
	$result = "";
	$maximum = mb_strlen($keyspace, '8bit') - 1;
	for ($x = 0; $x < $length; ++$x) {
		$result .= $keyspace[random_int(0, $maximum)];
	}
	return $result;
}
echo "<br>" . randomString(11);
echo "<br>" . randomString(15, '0123456789') . "<br>";
/*
    $test = 'abcdefg';
    echo $test[6] . $test[1] . $test[5];
    echo "<br>" . $test;
*/

//Convert scientific notation to an int and a float
$scientific = 6.6e-4;
echo "<br>" . (int)$scientific;
echo "<br>" . (float)$scientific . "<br>";

//Get information regarding memory usage in KB or MB
$bytes = memory_get_usage(false);
echo "<br>$bytes bytes";
echo "<br>" . $bytes/1000 . " KB's";
echo "<br>" . $bytes/1000000 . " MB's<br>";
//Another way
$memoryUnit = array('Bytes', 'KB', 'MB', 'GB', 'TB', 'PB');
echo 'Memory used: ' . round($bytes/pow(1024,($x = floor(log($bytes, 1024)))), 2) . ' ' . $memoryUnit[$x] . "<br>";

//Find earliest and latest dates from a list of dates.
$dates = array('10-6-2017', '04-05-2017', '10-01-2018', '09-12-2017');
$earliestDate = strtotime($dates[0]);
$latestDate = strtotime($dates[0]);
foreach ($dates as $value) {
	if (strtotime($value) < $earliestDate) {
		$earliestDate = strtotime($value);
	}
	if (strtotime($value) > $latestDate) {
		$latestDate = strtotime($value);
	}
}
echo "<br>Earliest Date: " . date("d-m-Y", $earliestDate);
echo "<br>Latest Date: " . date("d-m-Y", $latestDate) . "<br>";

//Function to round a float away from zero to a specified number of decimals places.
function roundUp($float, $decimals = 0)
{
	$result = $float * pow(10, $decimals);
	if ($decimals < 0) {
		$decimals = 0;
	}
	if ($float >= 0) {
	    $result = ceil($result);
    } else {
    	$result = floor($result);
    }
    $result = $result / pow(10, $decimals);
    return $result;
}
echo "<br>" .roundUp(78.78001, 2);
echo "<br>" .roundUp(8.131001, 2);
echo "<br>" .roundUp(0.586001, 4);
echo "<br>" .roundUp(-.125481, 3);
echo "<br>" .roundup(.125481) . "<br>";
/*
    function roundOut($float, $decimals)
    {
	    if ($decimals < 0) {
	        $decimals = 0;
	    }
	    $x = pow(10, $decimals);
	    return ($float >=0 ? ceil($float * $x):floor($float * $x)) / $x;
    }
*/
//Get random float numbers
function randomFloat($startNumber = 0, $endNumber = 1, $multiplied = 1000000) 
{
	if ($startNumber > $endNumber) {
		return false;
	}
	return mt_rand($startNumber * $multiplied, $endNumber * $multiplied) / $multiplied;
}
echo "<br>" . randomFloat(0, 10, 10);
echo "<br>" . randomFloat(0, 100, 100);
echo "<br>" . randomFloat(0, 1000, 1000);
echo "<br>" . randomFloat(0, 10000, 10000) . "<br>";

//Create a string for captcha
function randomCatpcha($length = 5) {
	$result = "";
	$characters = 'bcdfghjklmnpqrstvwxyzaeiou';
	for ($x = 0; $x < $length; $x++) {
		$result .= ($x%2) ? $characters[mt_rand(19, 23)] : $characters[mt_rand(0, 18)];
	}
	return $result;
}
echo "<br>" . randomCatpcha();
echo "<br>" . randomCatpcha(7);
echo "<br>" . randomCatpcha(8);

//Get the distance between two points on the earth
function distanceBetweenTwoPoints($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo) 
{
    $pi = pi();
    $x = sin($latitudeFrom * $pi / 180) *
        sin($latitudeTo * $pi / 180) +
        cos($latitudeFrom * $pi / 180) *
        cos($latitudeTo * $pi / 180) *
        cos(($longitudeTo * $pi / 180) - ($longitudeFrom * $pi / 180));
    $x = atan((sqrt(1 - pow($x, 2 ))) / $x);
    return abs((1.852 * 60.0 * (($x / $pi) * 180)) / 1.609344);
}
echo "<br>" . distanceBetweenTwoPoints(40.7127, 74.0059, 51.5072, 0.1275) . " miles.<br>";
?>