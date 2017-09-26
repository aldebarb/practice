<?php
// display 1-2-3-..-10 
function displayRange($int)
{
	$result = "";
    for ($i = 1; $i <= $int; $i++) { 
	    if ($i == $int) {
	    	$result .= $i;
	    } else {
	    	$result .= $i . "-";
	    }
    }
    return $result;
}
echo displayRange(20);

//add all the intergers leading up to the argument
function addIntegers($int)
{
    $result = 0;
    for ($i = 1; $i <= $int; $i++) { 
        $result += $i;    
    }
    return $result;
}
echo "<br>" . addIntegers(30) . "<br>";

//build a increasing star pattern
function patternBuild($int)
{
	$result = "";
	for ($x = 1; $x <= $int; $x++) { 
		for ($y = 1; $y <= $x; $y++) { 
			$result .= "* ";
		}
		$result .= "<br>";
	}
	return $result;
}
echo patternBuild(5);

//build and increasing and decreasing star pattern
function biggerPatternBuild($max)
{
	$result = "";
    for ($x = 1; $x <= $max; $x++) {
    	for ($y = 1; $y <= $x; $y++) {
    		$result .= "* ";
    	}
    	$result .= "<br>";
    }
    for ($z = $max; $z > 0; $z--) { 
    	for ($a = 1; $a <= $z; $a++) {
            $result .= "* ";
    	}
    	$result .= "<br>";
    }
    return $result;
}
echo biggerPatternBuild(6);

//calculate fractorials

function fractorials($int)
{
	$result = 1;
	for ($x = 1; $x <= $int; $x++) {
        $result *= $x;
	}
	return $result;
}
echo fractorials(6);

//list all potential two digit combinations
$twoDigitCombinations = "";
for ($tenth = 0; $tenth < 10; $tenth++) {
	for ($hundredth = 0; $hundredth < 10; $hundredth++) {
		$twoDigitCombinations .= $tenth . $hundredth . ", ";
	}
}
echo "<br>" . $twoDigitCombinations . "\n";

function characterCount($string, $character)
{
	$count = 0;
	$stringLength = strlen($string);
	for ($x = 0; $x <= $stringLength; $x++) {
        if (substr($string, $x, 1) == $character) {
        	$count++;
        }
	}
	return $count;
}
echo "<br>" . "The number of r's in Tyrannosaurus " . characterCount('Tyrannosaurus', 'r') . "<br><br>";
?>

<table border="10" cellpadding="10">
    <?php 
    //Create a times table 6x6 using for loops
    $tempResult = 0;
    for ($first = 1; $first <= 5; $first++) {
        echo "<tr>";
        for ($second = 1; $second <= 5; $second++) {
            $tempResult = $first * $second;
            echo "<td>$first * $second = " . $tempResult . "</td> ";
        }
        echo "</tr>";
    }
    ?>
</table>

<table  border="3" cellpadding="10" width="270px">
    <?php 
    //Create a checker board
    $remainder = 0;
    for ($row = 1; $row <= 8; $row++) {
        echo "<tr>";
        for ($color = 1; $color <= 8; $color++) {
            $remainder = ($row + $color) % 2;
            if ($remainder == 0) {
                echo "<td style='background-color:black'></td>";
            } elseif($remainder == 1) {
                echo "<td style='background-color:white'></td>";
            }
        }
        echo "</tr>";
    }    
    ?>
</table>

<table border="2" cellpadding="2">
    <?php 
    $multiplesTable = 0;
    for ($firstMultiple = 1; $firstMultiple <= 10; $firstMultiple++) {
        echo "<tr>";
        for ($secondMultiple = 1; $secondMultiple <= 10; $secondMultiple++) {
            $multiplesTable = $firstMultiple * $secondMultiple;
            echo "<td>$multiplesTable</td>";
        }
        echo "</tr>";
    }
    ?>
</table>

<?php 
for ($integers = 1; $integers <= 50; $integers++) {
    //Or if ($integers % 3 == 0 && $integers % 5 == 0)
    if (is_int($integers / 3) && is_int($integers / 5)) {
        echo $integers . "Both ";
    } elseif (is_int($integers / 3)) {
        echo $integers . " ";
    } elseif (is_int($integers / 5)) {
        echo $integers . " ";
    }
}
?>
<br><br>

<?php 
//Floyd Triangle
function floydTriangle($numberofLines)
{
    $triangle = "";
    $count = 1;
    for ($column = 1; $column <= $numberofLines; $column++) { 
        for ($row = 1; $row <= $column; $row++) {
            $triangle .= $count++ . " ";
        }
        $triangle .= "<br>";
    }
    return $triangle;
}
echo floydTriangle(4);
echo floydTriangle(10);

//The letter A
function letterA()
{
    $string = "";
    for ($row1 = 0; $row1 <= 7; $row1++) {
        for ($column1 = 0; $column1 <= 7; $column1++) {
            if ((($column1 == 1 || $column1 == 5) && $row1 != 0) || (($row1 == 0 || $row1 == 3) && ($column1 > 1 && $column1 < 5))) {
                $string .= "*";
            } else {
                $string .= '_';
            }
        }
        $string .= "<br>";
    }
    return $string;
}
echo letterA();
?>