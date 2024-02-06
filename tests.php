<?php

require_once("src/DateFormatter.php");
// Example usage:
$dateFormatter = new DateFormatter();

// Format in the default way
$timestamp = time();
$formattedDateDefault = $dateFormatter->formatDateWithTimeStamp($timestamp);
echo "Default Format/Timezone: $formattedDateDefault\n";

echo "<br>";
// Format in a different way and different timezone
$timestamp = time();
$formattedDateCustom = $dateFormatter->formatDateWithTimeStamp($timestamp, "l, F j, Y g:i A", "America/New_York");
echo "Custom Format/Timezone: $formattedDateCustom\n";

echo "<br>";

// Format in a different way and different timezone
$timestamp = $dateFormatter->formatDate('2024-12-20', '"d-m-Y"');
echo $timestamp;
echo "<br>";
//$formattedDateCustom = $dateFormatter->formatDate($timestamp, "d-m-Y");
//echo "Custom Format/Timezone: $formattedDateCustom\n";

// Calculate the number of days between two dates
$startTimestamp = "2023-05-01";
$endTimestamp = "2024-01-01";
$daysDifference = $dateFormatter->getDaysDifference($startTimestamp, $endTimestamp);
echo "Number of days between the two dates: $daysDifference days <br><br>";

$startTimestamp = "2024-01-20 12:00:00";
$endTimestamp = "2024-01-21 15:30:00";
$hoursDifference = $dateFormatter->getHoursDifference($startTimestamp, $endTimestamp);

echo "Number of hours between the two timestamps: $hoursDifference hours <br><br>";

$startTimestamp = "2024-01-20 12:00:00";
$endTimestamp = "2024-01-21 15:30:00";
$difference = $dateFormatter->getHoursAndMinutesDifferenceArray($startTimestamp, $endTimestamp);

echo "Number of hours: {$difference['hours']} hours\n";
echo "Number of minutes: {$difference['minutes']} minutes\n";

$startTimestamp = "2024-01-20 12:00:00";
$endTimestamp = "2024-01-21 15:30:00";
$difference = $dateFormatter->getHoursAndMinutesDifferenceString($startTimestamp, $endTimestamp);

echo "Time Difference: $difference <br>";


$startDate = '2020-01-01';
$endDate = '2022-12-31';
$difference = $dateFormatter->getYearsAndDaysDifferenceArray($startDate, $endDate);

echo "Number of years: {$difference['years']} years\n";
echo "Number of days: {$difference['days']} days <br>";

echo $dateFormatter->getYearsAndDaysDifferenceString($startDate, $endDate);

?>

<form>
    <input type="date" name="date">
    <input type="submit">
</form>