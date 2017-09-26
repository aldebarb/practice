<?php 
//decode the json
$json = 
'{
	"uglify-js": "1.3.4"
	, "jshint": "0.9.1"
	, "recess": "1.1.8"
	, "connect": "2.1.3"
	, "hogan.js": "2.0.0"
}';
var_dump(json_decode($json));
echo "<br>";
var_dump(json_decode($json, true));

//decode large integers.
echo "<br><br>";
$json2 = '{"number": 12345678901234567891234567890}';
var_dump(json_decode($json2));

//Get json representation of a value from an array
$array3 = array("uglify-js"=> "1.3.4", "jshint"=> "0.9.1", "recess"=> "1.1.8", "connect"=> "2.1.3", "hogan.js"=> "2.0.0");
$myArray = array('red', 'green', 'white');
echo "<br><br>";
var_dump(json_encode($array3));
echo "<br><br>";
var_dump(json_encode($myArray));

//Display json decode errors.
function jsonErrorMessage($jsonString)
{
	$json[] = $jsonString;
	echo $json;
	foreach ($json as $string) {
		echo 'Decoding: ' . $string . "<br>";
		json_decode($string);
	    switch (json_last_error()) {
        case JSON_ERROR_NONE:
            echo " - No errors<br>";
            break;
        
        case JSON_ERROR_DEPTH:
            echo " - Maximum stack depth exceeded<br>";
            break;

        case JSON_ERROR_STATE_MISMATCH:
            echo " - Underflow or the modes mismatch<br>";
            break;

        case JSON_ERROR_CTRL_CHAR:
            echo " - Unexpected control character found<br>";
            break;

        case JSON_ERROR_SYNTAX:
            echo " - Syntax error, malformed JSON<br>";
            break;

        case JSON_ERROR_UTF8:
            echo " - Malformed UTF-8 characters, possibly incorrect encoded<br>";
            break;

        default:
            echo " - Unknown error<br>";
	    }
	}	
}
jsonErrorMessage('{"color1": "Red Color"}');
?>