<?php 
echo "The default timezone is: " . date_default_timezone_get();

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Practicing with Dates</title>
	<script type="text/javascript" src="firstscript.js" ></script>
</head>
<body>
<!--Display the copyright and year copywrite is  alt-0169 -->
<p>© <?php echo date('m/d/Y h:i:s a') . " Practice Problems";?></p>

<?php 
//Create a countdown.
$america = mktime(0,0,0,7,4,2018);
$today = time();
$diff_days = ($america - $today);
$days = (int)($diff_days/86400);
echo "Days until Americas Birthday: $days days!" . "<br>";

//date in 3 different formats
echo "<br>" . date("Y/m/d") . "<br>";
echo date("y.m.d") . "<br>";
echo date("d-m-y") . "<br>";

//calculate the difference between two dates.
$startDate = "1980-10-31";
$endDate = "2017-10-31";
$date_difference = abs(strtotime($endDate) - strtotime($startDate));
$years = floor($date_difference / (365*60*60*24));
$months = floor(($date_difference - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($date_difference - $years * 365*60*60*24 - $months * 30*60*60*24) / (60*60*24));
//printf has place holders %d for integers and %s for strings.
printf("<br>%d years, %d months, %d days", $years, $months, $days);
printf("<br> $years years, $months months, $days days <br>");

//convert date from y-m-d to d-m-y
$orginalDate = "1999-09-19";
$newDate = date("d-m-Y", strtotime($orginalDate));
echo "<br>Orginal date: " . $orginalDate . "<br>";
echo "New date: " . $newDate . "<br>";

//Convert a date to a timestamp
$timeStamp = strtotime('24-12-2017');
echo "<br>Timestamp " . $timeStamp . "<br>";

//calculate teh number of days between two dates
$todaysDate = time(); //or you can use strtotime("2017-01-01")
$fromDate = strtotime("2000-01-01");
$dayDifference = $todaysDate - $fromDate;
echo "<br>" . floor($dayDifference/(60*60*24)) ."<br>";

//get the first and last day of the month
$date = "1999-2-15";
echo "<br>First Day: " . date("Y-m-01", strtotime($date)) . " - Last Day: " . date("Y-m-t", strtotime($date)) . "<br>";

//print in the format saturday the 7th
echo "<br>" . date('l \t\h\e jS') . "<br>";

//How to check if dates are valid or not
//var_dump(checkdate()) returns true or false.
var_dump(checkdate(2, 30, 2008));
var_dump(checkdate(2, 29, 2008));
echo "<br><br>";

//Get the difference in total days and years, months days hours minutes and seconds between two dates.
$dateOne = new DateTime('2000-06-01 03:30:51');
$dateTwo = $dateOne->diff(new DateTime('2017-10-6 11:11:11'));
echo $dateTwo->days . " total days<br>";
echo $dateTwo->y . " years<br>";
echo $dateTwo->m . " months<br>";
echo $dateTwo->d . " days<br>";
echo $dateTwo->h . " hours<br>";
echo $dateTwo->i . " minutes<br>";
echo $dateTwo->s . " seconds<br>";

//Change month number to month name
$monthNumber = 10;
$monthName = date("F", mktime(0, 0, 0, $monthNumber, 10));
echo "<br>" . $monthName . "<br>";

//Get yesterdays date.
$dateTime = new DateTime();
$dateTime->sub(new DateInterval('P1D'));
echo "<br>" . $dateTime->format('F j, Y') . "<br>";

//Get the current date/time of 'Australia/Melbourne'
date_default_timezone_set('Australia/Melbourne');
$Los_Angeles = date('m/d/Y h:i:s a', time());
echo $Los_Angeles;

//check if weekend or not
$dateToCheck = '2017-10-31';
$temporaryDate = strtotime($dateToCheck);
$temporaryDate = date("l", $temporaryDate);
$temporaryDate = strtolower($temporaryDate);
echo "<br>$dateToCheck is a " . ucfirst($temporaryDate) . "<br>";
//Or
$temporaryDate1 = strtolower(date("l", strtotime($dateToCheck)));
echo "<br>" . ucfirst($temporaryDate1) . "<br>";

//Add or subtract days from a specific date
$dateToAdjust = '2017-01-01';
echo "<br>Orginal date : $dateToAdjust<br>";
$numberOfDays = 39;
$beforeDate = strtotime("-" . $numberOfDays . " days", strtotime($dateToAdjust));
$afterDate = strtotime("+" . $numberOfDays . " days", strtotime($dateToAdjust));
echo "Before 39 days: " . date("Y-m-d", $beforeDate) . "<br>";
echo "After 39 days: " . date("Y-m-d", $afterDate) . "<br>";

//Get the start and end date of a week (by week number) of a particular year
function startEndDateOfAWeek($week, $year) 
{
	$time = strtotime("1  January $year", time());
	$day = date("w", $time);
	$time += ((7 * $week) + 1 - $day) * 24 * 3600;
	$dates[0] = date("Y-n-j", $time);
	$time += 6 * 24 * 3600;
	$dates[1] = date("Y-n-j", $time);
	return $dates;
}
$result = startEndDateOfAWeek(12, 2014);
echo "Starting date of the week: $result[0]<br>";
echo "End date of the week: $result[1]<br>";

//Calculate someones age.
$birthday = new DateTime('8.1.1980');
$today = new DateTime(date('m.d.y'));
$differenceBetween = $today->diff($birthday);
printf("<br>Your age is %d years, %d month, %d days", $differenceBetween->y, $differenceBetween->m, $differenceBetween->d);
printf("<br>");

//Calculate weeks between days.
function weeksBetweenTwoDates($date1, $date2)
{
	$first = DateTime::createFromFormat('m/d/Y', $date1);
	$second = DateTime::createFromFormat('m/d/Y', $date2);
	if ($date1 > $date2) {
		return weeksBetweenTwoDates($date2, $date1);
	}
	return floor($first->diff($second)->days / 7);
}
$firstDate = '1/1/2000';
$secondDate = '12/31/2001';
echo "<br>Weeks between $firstDate and $secondDate is " . weeksBetweenTwoDates($firstDate, $secondDate) . "<br>";

//print the number of the month before the current month
echo "<br>" . date('m', strtotime('-1 month')) . "<br>";
//Add a year
echo date('Y', strtotime('+1 year')) . "<br>";

//Conver seconds into days, hours, minutes and seconds;
function convertSeconds($seconds)
{
	$date1 = new DateTime("@0");
	$date2 = new DateTime("@$seconds");
	return $date1->diff($date2)->format("%a days, %h hours, %i minutes and %s seconds");
}
echo "<br>" . convertSeconds(2000000) . "<br>";

//Get the last 6 months from the current month
for ($i = 1; $i <= 6; $i++) {
	$lastMonths[] = date("Y-m%", strtotime(date("Y-m-01") . "-$i months"));
}
echo "<br>";
var_dump($lastMonths);
echo "<br><br>";
//Or
$dateString = "";
$dateStringForward = "";
for ($i = 1; $i <= 6; $i++) {
	$dateString .= date("M - Y", strtotime("-$i Months")) . "<br>";
}
echo $dateString;
//Works forward as well
for ($i = 1; $i <= 6; $i++) {
	$dateStringForward .= date("m - Y", strtotime("+$i months")) . "<br>";
}
echo "<br>$dateStringForward<br>";

//Increment a specific date by one month
$specificDate = strtotime("1999-12-01");
echo "<br>" . date("Y-m-d", strtotime("+1 month", $specificDate)) . "<br>";

//Convert month number to month name
$monthNumber = 10;
$dateObject = DateTime::createFromFormat('!m', $monthNumber);
$monthName = $dateObject->format('F');
echo "<br>Convert month number 10 to: $monthName<br>";

//Get the number of days of the current month
echo "<br>Number of days for the month of " . date("F") . " is: " . date('t') . "<br>";

?>
</body>
</html>
