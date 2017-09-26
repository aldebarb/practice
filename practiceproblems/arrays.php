<?php 
$color = array('white', 'green', 'red', 'blue', 'black');
$string = "The memory of that scene for me is like a frame of film forever frozen at that moment: the $color[2] carpet, the $color[1] lawn, the $color[0] house, the leaden sky. The new president and his first lady. - Richard M. Nixon";
echo $string;
$color1 = array('white', 'green', 'red');
?>

<ul>
	<li><?php echo $color1[1];?></li>
	<li><?php echo $color1[2];?></li>
	<li><?php echo $color1[0];?></li>
</ul><br><br>

<?php 
$ceu = array('Italy'=>'Rome', 'Luxembourg'=>'Luxembourg', 'Belgium'=>'Brussls', 'Denmark'=>'Copenhagen', 'Finland'=>'Helsinki', 'France'=>'Paris', 'Slovakia'=>'Bratislava', 'Slovenia'=>'Ljubljana', 'Germany'=>'Berlin', 'Greece'=>'Athens', 'Ireland'=>'Dublin', 'Netherlands'=>'Amsterdam', 'Portugal'=>'Lisbon', 'Spain'=>'Madrid', 'Sweden'=>'Stockholm', 'United Kingdom'=>'London', 'Cyprus'=>'Nicosia', 'Lithuania'=>'Vilnius', 'Czech Republic'=>'Prague', 'Estonia'=>'Tallin', 'Hungary'=>'Budapest', 'Latvia'=>'Riga', 'Malta'=>'Valetta', 'Austria'=>'Vienna', 'Poland'=>'Warsaw');
asort($ceu);
foreach ($ceu as $country => $capital) {
	echo "The capital of $country is $capital <br>";
}

//#4
$x = array(1, 2, 3, 4, 5);
unset($x[2]);
print_r($x);
//sort($x); Will resort the values but array_values will reassign numerical values.
$x = array_values($x);
echo "<br>";
print_r($x);
echo "<br>";

//#5 reset($color) sets the pointer back to one
$color = array(4 =>'white', 6=>'green', 11=>'red');
echo "<br> $color[4] <br>";

//#6 Decode JSON String
//write a function
function rewordJSON($key, $value)
{
	echo "$key : $value <br>";
}
$string = '{"Title": "The Cuckoos Calling", "Author": "Robert Galbraith", "Detail": {"Publisher": "Little Brown"}}';
$j1 = json_decode($string, true);
array_walk_recursive($j1, "rewordJSON");

//#7
$array = array(1, 2, 3, 4, 5,);
echo 'Original Array: ';
foreach ($array as $key) {
	echo "$key ";
}
$insert = "$";
array_splice($array, 3, 0, $insert);
echo "<br> New Array: ";
foreach ($array as $key) {
	echo "$key ";
}
echo "<br>";

//#8
$array = array('Sophia'=>'31', 'Jacob'=>'41', 'William'=>'39', 'Ramesh'=>'40');
asort($array);
var_dump($array);
echo "<br>";
ksort($array);
var_dump($array);
echo "<br>";
arsort($array);
var_dump($array);
echo "<br>";
krsort($array);
var_dump($array);
echo "<br>";

//#9 Find Avg, 7 lowest and 7 highest;
 $array = array(78,60,62,68,71,68,73,85,66,64,76,63,75,76,73,68,62,73,72,65,74,62,62,65,64,68,73,75,79,73);
sort($array);
$arrayCount = count($array);
$sum = array_sum($array);
$average = $sum/$arrayCount;
echo "The Average is :" . round($average, 2) . "<br>";
//7 lowest
echo "List of seven lowest Temps: ";
for ($i=0; $i < 7; $i++) { 
	echo $array[$i] . ", ";
}
echo "<br>";

//7 highest
$sevenHighest = $arrayCount - 7;
echo "<br> List of seven highest temps (using ascending sort): ";
for ($i=$sevenHighest; $i < $arrayCount ; $i++) { 
	echo $array[$i] . ", ";
}

//Now highest to lowest
echo "<br> List of seven highest temps (using ascending from high to low): ";
for ($i=$arrayCount-1; $i >=$sevenHighest ; $i--) { 
	echo $array[$i] . ", ";
}
echo "<br>";

//OR
rsort($array);
echo "<br> List of seven highest temps (using descending sort easier): ";
for ($i=0; $i < 7; $i++) { 
	echo  $array[$i] . ", ";
}
echo "<br>";

//#10 bead sort (Think Gravity Sort)
function columns($arr)
{
	if (count($arr) == 0) {
		return array();
	} elseif (count($arr) == 1) {
	    return array_chunk($arr[0], 1);
	}
	array_unshift($arr, Null);
	//aray_mapp(NULL, $arr[0], $arr[1], ...)
	$transpose = call_user_func_array('array_map', $arr);
	return array_map('array_filter', $transpose);
}

function beadSort($arr)
{
	foreach ($arr as $key) {
		$poles [] = array_fill(0, $key, 1);
	}
	return array_map('count', columns(columns($poles)));
}
$array = array(5, 3, 1, 3, 8, 7, 4, 1, 1, 3 );
print_r($array);
echo "<br>";
print_r(beadSort($array));

//#11 Merge two arrays by index
$array1 = array(array(77, 87), array(23,45));
$array2 = array("Merge these", "two");

function merge_arrays_by_index($x, $y)
{
	$temp = array();
	$temp[] = $x;
	if (is_scalar($y)) {
		$temp[] = $y;
	} else {
		foreach($y as $key => $value){
			$temp[] = $value;
		}
	}
    return $temp;
}
echo "<pre>";
print_r(array_map('merge_arrays_by_index', $array2, $array1));

//12Change the following arrays all values to upper and lowercase
$colorArray = array('A' => 'Blue', 'B' => 'Green', 'c' => 'Red');
$temp = array();
//Upper case
foreach ($colorArray as $key => $value) {
	$temp[strtoupper($key)] = strtoupper($value);
}
print_r($temp);
$temp = array();
//Lower case
foreach ($colorArray as $key => $value) {
	$temp[strtolower($key)] = strtolower($value);
}
print_r($temp);

//#13 display numbers from 200 to 250 divisible by 4
echo "<br>" . implode(',', range(200, 250, 4)) . "<br>";

//#14 count the array and find the highest and lowest number
$arrayCount = array('abcd', 'he', 'a56', 'jj', 'afk', 'Tacometacoyou');
$min = strlen($arrayCount[0]);
$max = strlen($arrayCount[0]);
foreach ($arrayCount as $key => $value) {
	$valueCount = strlen($value);
	if ($valueCount < $min) {
		$min = $valueCount;
	}
	if ($valueCount > $max) {
		$max = $valueCount;
	}
}
echo "<br>The minimum count in the array is $min <br>";
echo "The maximum count in the array is $max <br>";

//#15 Generate random numbers within a range between(11, 20)
$arrayRandom = array();
for ($i=0; $i < 10 ; $i++) { 
    $arrayRandom[] = mt_rand(11, 20);
}
echo "<br> Random numbers: " . implode(', ', $arrayRandom);

//#16 get the largest key in an array
$arrayKey = array('one', 'two', 'three', 'four', 'five', 'six');
foreach ($arrayKey as $key => $value) {
	$temporary = $key;
}
echo "<br>The largest key is $temporary";
//OR
$maxKey = max(array_keys($arrayKey));
echo " Their way: $maxKey<br>";

//#17 return the lowest integer that is not 0
$arrayInteger = array('0', '5', '7', '100', '4', '-5');
$minInteger = min($arrayInteger);
echo "Using the min() function $minInteger<br>";
//The min function returns 0
//First set the min to a positive integer
function findFirstInteger($array)
{
	foreach ($array as $key => $value) {
		if ($value > 0) {
			return $value;
		}
	}
}
$min = findFirstInteger($arrayInteger);
//Next check the min against the rest of the array.
foreach ($arrayInteger as $key => $value) {
	if ($value > 0) {
		$tempCheck = $value;
        if ($tempCheck < $min) {
        	$min = $tempCheck;
        }
	}
}
echo "The Minimum in the array without zero $min <br>";

/*Their way to solve this one
function minValuesNotZero(Array $values)
{
	return min(array_diff(array_map('intval', $values), array(0)));
}
print_r(minValuesNotZero(array(-1,0,1,12,-100,1)) . "<br>")
*/

//#18 write a php function to floor decimal numbers with precision
function floorDecimals($number, $precision, $separator)
{
	$numberPart = explode($separator, $number);
	$numberPart[1] = substr_replace($numberPart[1], $separator, $precision, 0);
	if ($numberPart[0] >= 0) {
		$numberPart[1] = floor($numberPart[1]);
	} else {
		$numebrPart[1] = ceil($numberPart[1]);
	}
	$ceilNumber = array($numberPart[0], $numberPart[1]);
	return implode($separator, $ceilNumber);
}
print_r(floorDecimals(1.155, 2, ".") . "<br>");

//#19 print "second" and Red from array
$colorPrint = array("color" => array("a" => "Red", "b" => "Green", "c" => "White"),
 "numbers" => array(1, 2, 3, 4, 5, 6), 
 "holes" => array("First", 5 => "Second", "Third"));
print_r($colorPrint['color']['a'] . "<br>");
print_r($colorPrint['holes']['5'] . "<br>");
echo $colorPrint["holes"][5] . "<br>";

//#20 Function to sort an array according to another array acting as a priority list
function list_cmp($a, $b)
{
	global $order;
	foreach ($order as $key => $value) {
		if ($a == $value) {
			return 0;
			break;
		}
		if ($b == $value) {
			return 1;
			break;
		}
	}
}
$order = array(5, 1, 2, 4, 3);
$array = array(2,1,3,4,2,1,2);
usort($array, "list_cmp");
print_r($array);

//#21 function to sort subnets
function sortSubnets($x, $y)
{
	$xArray = explode('.', $x);
	$yArray = explode('.', $y);
	foreach (range(0,3) as $i) {
		if ($xArray[$i] < $yArray[$i]) {
			return -1;
		} elseif ($xArray[$i] > $yArray[$i]) {
			return 1;
		}
	}
	return -1;
}
$subnetList = array( '192.169.12', '192.167.11', '192.169.14', '192.168.13', '192.167.12', '122.169.15', '192.167.16');
usort($subnetList, 'sortSubnets');
print_r($subnetList);

//#22 sort the following array by the day (page_id) and username
$arra[0]['transactionId'] = '2025731470';
$arra[1]['transactionId'] = '2025731450';
$arra[2]['transactionId'] = '1025731456';
$arra[3]['transactionId'] = '1025731460';
$arra[0]['userName'] = 'Sana';
$arra[1]['userName'] = 'Illiya';
$arra[2]['userName'] = 'Robin';
$arra[3]['userName'] = 'Samantha';

//convert timestamp to date
function convertTimestamp($timestamp)
{
    $limit = date("U");
    $limiting = $timestamp - $limit;
    return date("Ymd", mktime (0, 0, $limiting));
}
//comparison function
function comparison($a, $b)
{
	$l = convertTimestamp($a['transactionId']);
	$k = convertTimestamp($b['transactionId']);
	if ($k == $l) {
		return strcmp($a['userName'], $b['userName']);
	} else { 
		return strcmp($k, $l);
	}
}
usort($arra, "comparison");
//print sorted info
while (list ($key, $value) = each ($arra)) {
	echo "\$arra[$key]: ";
	echo $value['transactionId'];
	echo " userName: ";
	echo $value ["userName"];
	echo "\n";
}

//# 23 sort multi-dimensional array set by a specific key
function columnSort($unsorted, $column)
{
	$sorted = $unsorted;
	for ($i = 0; $i < sizeof($sorted) - 1 ; $i++) { 
		for ($j = 0; $j < sizeof($sorted) - 1; $j++) { 
			if ($sorted[$j][$column] > $sorted[$j + 1][$column]) {
				//Stores J into a temp variable
				$tmp = $sorted[$j]; 
				//Replace Sorted J with the next element in the array.
				$sorted[$j] = $sorted[$j + 1]; 
				//Finally replace the the next element with the orginal J
				$sorted[$j + 1] = $tmp; 
			}
		}
	}
	return $sorted;
}
$myArray = array(
	array('name' => 'Sana', 'email' => 'sana@example.com', 'phone' => '111-111-1234', 'country' => 'USA'), 
	array('name' => 'Robin', 'email' => 'robin@example.com', 'phone' => '222-222-1235', 'country' => 'UK'),
	array('name' => 'Sofia', 'email' => 'sofia@example.com', 'phone' => '333-333-1236', 'country' => 'India'));
//**This function works for each key - name, phone, email anc country.**//
print_r(columnSort($myArray, 'phone'));

//#24 sort an array using case_insensitive natural ordering.
$colorOrder = array('red', 'green', 'purple', 'orange', 'color1', 'color120');
sort($colorOrder, SORT_NATURAL | SORT_FLAG_CASE);
foreach ($colorOrder as $key => $value) {
		echo "Colors[" . $key . "] = " . $value . "\n";
}

//#26 shuffle an associative array, preserving the key and value pairs.
function shuffleAssociate($myArray)
{
	$keys = array_keys($myArray);
    shuffle($keys);
    foreach ($keys as $key) {
    	$new[$key] = $myArray[$key];
    }
    $myArray = $new;
    return $myArray;
}
print_r(shuffleAssociate($colorOrder));

//#27 generate a random password using the shuffle() funciton
function randomPassword($upper = 1, $lower = 5, $numeric = 3, $other = 2)
{
	$passwordOrder = array();
	$password = '' ;
	//create contents of the password
	for ($i = 0; $i < $upper ; $i++) { 
		$passwordOder[] = chr(rand(65, 90));
	}
	for ($i = 0; $i < $lower ; $i++) { 
		$passwordOrder[] = chr(rand(97, 122));
	}
	for ($i = 0; $i < $numeric ; $i++) { 
		$passwordOrder[] = chr(rand(48, 57));
	}
	for ($i = 0; $i < $other; $i++) { 
		$passwordOrder[] = chr(rand(33, 47));
	}
	//using shuffle() to shuffle the order
	shuffle($passwordOrder);
	//final password string
	foreach ($passwordOrder as $char) {
		$password .= $char;
	}
	return $password;
}
echo "<br>The random generated password is : " . randomPassword() . "\n";

//#28 sort an array in reverse order (highest to lowest)
rsort($colorOrder);
print_r($colorOrder);

//#29 generate an array with a range taken from a string
/*They expect a range $string = "1-5, 10-11, 20-30"
$string = "This is a string for an array.";
$stringArray = explode(" ", $string);
print_r($stringArray);
*/

//#31 get the index of the highest value in an associative array
$assocArray = array("one" => 150, "two" => 250, "three" => 350, "four" => 500);

function indexHighestValue($array)
{
    $max = $array["one"];
    $maxKey = key($array);
    echo "Max initial value $max";
    foreach ($array as $key => $value) {
	    if ($array[$key] > $max) {
		    $max = $array[$key];
		    $maxKey = $key;
	    }
    } 
    $string = "<br>The Max is $max key is $maxKey <br>";
    return $string;
}
echo indexHighestValue($assocArray);

//OR in just a few lines
//Reset the array pointer
reset($assocArray);
arsort($assocArray);
echo "The key of the highest value is " . key($assocArray) . "<br>";

//#33 function to search a specified value within the values of an associative array

function searchValue($array, $valueInput)
{
	foreach ($array as $key => $value) {
		if($valueInput == $value) {
			return true;
		}
	}
	return false;
}
if (searchValue($assocArray, 250)) {
	echo "Your value is in the array!<br>";
} else {
	echo "Your value is not in the array<br>";
}

//#34 sort and associative array (alphanumeric with case sensitive data) by values
asort($assocArray, SORT_SRING | SORT_FLAG_CASE | SORT_NATURAL);
echo "Sort alphanumeric and case sensitive. ";
print_r($assocArray);

//#35 trim all the elements in an array usking array_walk
array_walk($assocArray, 'trim');

//#39 Remove duplicates from an array
$arrayDuplicates = array(1,2,3,4,1,2,1,2,12,3,4,5);
$arrayString = array('red', 'blue', 'green', 'blue', 'red');

function removeDuplicates($array)
{
	$result = array();
	foreach ($array as $key => $value) {
		if (!in_array($value, $result)) {
			$result[] = $value;
		}
	}
	return $result;
}
print_r($arrayDuplicates);
print_r(removeDuplicates($arrayDuplicates));
print_r(removeDuplicates($arrayString));

//If it is an array of integers
$uniqueIntegers = array_keys(array_flip($arrayDuplicates));
print_r($uniqueIntegers);
//If it is an array of strings
$uniqueStrings = array_keys(array_flip($arrayString));
print_r($uniqueStrings);
//or
print_r($arrayDuplicates);
$unique = array_unique($arrayDuplicates);
print_r($unique);

//#41 identify the email addresses which are not unique in an array
function valueNotUnique($array)
{
	$result = array();
	natcasesort($array);
	reset($array);
	$oldKey = NULL;
	$oldValue = NULL;
	foreach ($array as $key => $value) {
		if ($value === NULL) {
			continue;		
		}
	    if ($oldValue == $value) {
	    	$result[$oldKey] = $oldValue;
	    	$result[$key] = $value;
	    }
	    $oldValue = $value;
	    $oldKey = $key;
    }   
    return $result;
}
$emailArray = array('taco@yahoo.com', 'burrito@yahoo.com', 'taco@yahoo.com', 'queso@yahoo.com');
print_r(valueNotUnique($emailArray));

//#42 function to find unique values from a multidimensional arrays and flatten them in 0 depth.
function flattenArray($array)
{
	$flatArray = array();
	$list = 0;
	foreach ($array as $key => $value) {
		if (!is_array($value)) {
			$flatArray[] = $value;
			continue;
		}
		$list++;
		$flatArray = flattenArray($value, $flatArray, $list);
		$list--;
	}
	if ($list == 0) {
		$flatArray = array_values(array_unique($flatArray));
	}
	return $flatArray;
}
$multiArray = array('a' => array(-1,-2,0,1,2,3), 'b' => array('c' => array(-1,0,2,0,3)));
print_r(flattenArray($multiArray));

//#43 merge two comma separated lists with unique value only
$list1 = "4, 5, 6, 7, 3, 1";
$list2 = "4, 5, 7, 8, 7, 10";
$result1 = array_merge(explode(",", $list1), explode(",", $list2));
$result1 = array_unique($result1);
$result1 = implode(",", $result1);
echo $result1 . "<br>";

//#44 function to remove a specified duplicate entry from an array
function removeUniqueValue($array, $arrayValue)
{
	$count = 0;
    foreach ($array as $key => $value) {
		if (($count > 0) && ($value == $arrayValue)) {
			unset($array[$key]);
		}
		if ($value == $arrayValue) {
			$count++;
		}
	}
	return array_filter($array);
}
print_r(removeUniqueValue($arrayDuplicates, 2));

//#46 check if an array is made up of strings.
function checkStringsInArray($array)
{
    return array_sum(array_map('is_string', $array)) == count($array);
}
var_dump(checkStringsInArray($emailArray));

//#47 function to get an array with the first key and value
function getFirst($array)
{
	reset($array);
	$result[key($array)] =  $array[key($array)];
	return $result;
}
print_r(getFirst($arrayDuplicates));
print_r(getFirst($assocArray));
print_r(getFirst($ceu));

//Convert a string to an array
$longString = "This is a long string
set over mulitple lines
making this a really long string";

function stringConvert($string)
{
	$result = array_map('trim', explode("\n", $string));
	$result = array_filter($result, 'strlen');
	return $result;
}
print_r(stringConvert($longString));

//Using array fill
$array = array_fill(0, 5, array_fill(0, 5, 20));
print_r($array);
$arrayRange = range(10, 20);
$arrayRange2 = range(100, 110);
print_r(array_combine($arrayRange, $arrayRange2));
?>