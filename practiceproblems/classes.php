<?php 
//Initilize a string.
class InitializeString
{
    protected $string = "";
    public function setString1($string)
    {
    	$this->string = $string;
    }
    public function getString1()
    {
    	return $this->string;
    }
}
$initialString = new InitializeString();
$initialString->setString1("This class has been initialized!");
echo $initialString->getString1() . "<br>";

//Display and intro and pass an argument into a method
class WhoAndWhere
{
	protected $name;
	protected $location;
	public function __construct($name)
	{
         $this->name = $name;
         echo "<br>Hello, this is " . $this->name;
	}
	public function setLocation($location)
	{
		$this->location = $location;
	}
	public function getLocation()
	{
		return $this->location;
	}
	public function displayLocation()
	{
		echo "<br>" . $this->name . " is located in " . $this->getLocation() . "<br>";
	}
}
$rob = new WhoAndWhere("Robert");
$rob->setLocation("Florida");
$rob->displayLocation();

//Calculate the factorial of an integer
class Factorial
{
	protected $integer;
	protected $result = 1;
	public function __construct($integer)
	{
		if (!is_int($integer)) {
			throw new InvalidArgumentException("Not a number or missing argument!");
		}
		$this->integer = $integer;
	}
	public function getResult()
	{
		for ($x = 1; $x <= $this->integer; $x++) {
            $this->result *= $x;
		}
		return $this->result;
	}
}
$factorial = new Factorial(10);
echo "<br>The factorial of 10 is " . $factorial->getResult() . "<br>";

//Sort an integer array
class OrderArray
{
	protected $array = array();
	protected $sorted = array();
	public function __construct(array $array)
	{
		$this->array = $array;
	}
	public function sortArray()
	{
		$sorted = $this->array;
		sort($sorted);
		return $sorted;
	}
}
$numericalArray = array(5,10,25,4,100,99,-15,-25);
$newArray = new OrderArray($numericalArray);
print_r($newArray->sortArray());

//Calculate the difference between two dates.
/*
    class DateDifference
    {
	    protected $firstDate;
	    protected $secondDate;
	    public function __construct($firstDate, $secondDate)
	    {
	    	$this->firstDate = $firstDate;
		    $this->secondDate = $secondDate;
	    }
	    public function calculateDifference()
	    {
		    $difference = strtotime($this->secondDate) - strtotime($this->firstDate);
    		$years = floor($difference / (365*60*60*24));
    		$months = floor(($difference - $years * 365*60*60*24) / (30*60*60*24));
    		$days = floor(($difference - $years * 365*60*60*24 - $months * 30*60*60*24) / (60*60*24));

	    	return "$years years, $months months, $days days";
	    }
    }
    $newDateDifference = new DateDifference("1981-11-03", "2013-09-04");
    echo "<br>The difference between dates is " . $newDateDifference->calculateDifference() . "<br>";
*/
//DateTime() built in time class
$startDate = new DateTime("1981-11-03");
$endDate = new DateTime("2013-09-04");
$interval = $startDate->diff($endDate);
echo "<br>The difference between dates is " . $interval->y . " years " . $interval->m . " months " . $interval->d . " days.<br>";

//Calculator Class
class Calculator
{
	protected $firstInput = 0;
	protected $secondInput = 0;
	protected $result;
	public function __construct($firstInput, $secondInput)
	{
        $this->firstInput = $firstInput;
        $this->secondInput = $secondInput;
	}
	public function add()
	{
		return $this->result = $this->firstInput + $this->secondInput;
	}
	public function subtract()
	{
		return $this->result = $this->firstInput - $this->secondInput;
	}
	public function multiply()
	{
		return $this->result = $this->firstInput * $this->secondInput;
	}
	public function divide()
	{
		return $this->result = $this->firstInput / $this->secondInput;
	}
}
$newCalculation = new Calculator(7.1, 11);
echo "<br>" . $newCalculation->add();
echo "<br>" . $newCalculation->subtract();
echo "<br>" . $newCalculation->multiply();
echo "<br>" . $newCalculation->divide();

//Convert a string to Date and DatTime
$date = DateTime::createFromFormat('m-d-Y', '10-30-2017')->format('Y-m-d');
echo "<br>$date<br>";
?>