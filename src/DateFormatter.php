<?php

namespace DateFormatter;

use DateTime;
use DateTimeZone;

class DateFormatter {
    private $defaultFormat;
    private $defaultTimezone;

    public function __construct($defaultFormat = "Y-m-d H:i:s", $defaultTimezone = "UTC") {
        $this->defaultFormat = $defaultFormat;
        $this->defaultTimezone = $defaultTimezone;
    }

    public function formatDateWithTimeStamp($timestamp, $format = null, $timezone = null) {
        $format = $format ?? $this->defaultFormat;
        $timezone = $timezone ?? $this->defaultTimezone;

        $dateTime = new DateTime("@" . $timestamp);
        $dateTime->setTimezone(new DateTimeZone($timezone));
        return $dateTime->format($format);
    }
    public function formatDate($dateString, $format = null, $timezone = null) {
        $timezone = $timezone ?? $this->defaultTimezone;
    
        // Create a DateTime object based on the provided date string
        $dateTime = DateTime::createFromFormat('Y-m-d', $dateString);
    
        if ($dateTime === false) {
            throw new \Exception("Failed to parse the date string: $dateString");
        }
    
        // Set the desired timezone
        $dateTime->setTimezone(new DateTimeZone($timezone));
    
        // Return the Unix timestamp
        $timestamp =  $dateTime->getTimestamp();
        return $this->formatDateWithTimeStamp($timestamp,$format);
    }
    
    public function getDaysDifference($startTimestamp, $endTimestamp) {
        $startDate = new DateTime("@" .strtotime($startTimestamp));
        $endDate = new DateTime("@" . strtotime($endTimestamp));

        $interval = $endDate->diff($startDate);
        return $interval->days;
    }
    public function getHoursDifference($startTimestamp, $endTimestamp) {
        $startDate = new DateTime("@" . strtotime($startTimestamp));
        $endDate = new DateTime("@" . strtotime($endTimestamp));
    
        $interval = $endDate->diff($startDate);
    
        // Calculate the total number of hours
        $hours = $interval->days * 24 + $interval->h;
    
        return $hours;
    }
    public function getHoursAndMinutesDifferenceArray($startTimestamp, $endTimestamp) {
        $startDate = new DateTime("@" . strtotime($startTimestamp));
        $endDate = new DateTime("@" . strtotime($endTimestamp));
    
        $interval = $endDate->diff($startDate);
    
        // Calculate the total number of hours and minutes
        $hours = $interval->days * 24 + $interval->h;
        $minutes = $interval->i;
    
        return ['hours' => $hours, 'minutes' => $minutes];
    }
    public function getHoursAndMinutesDifferenceString($startTimestamp, $endTimestamp) {
        $difference = $this->getHoursAndMinutesDifferenceArray($startTimestamp, $endTimestamp);
        return $difference['hours'].':'.$difference['minutes'];
    }
    public function getYearsAndDaysDifferenceArray($startDate, $endDate) {
        $startDateObj = new DateTime($startDate);
        $endDateObj = new DateTime($endDate);
    
        $interval = $endDateObj->diff($startDateObj);
    
        // Calculate the total number of years and remaining days
        $totalDays = $interval->days;
        $years = floor($totalDays / 365);
        $remainingDays = $totalDays % 365;
    
        return ['years' => $years, 'days' => $remainingDays];
    }
    

    public function getYearsAndDaysDifferenceString($startDate, $endDate) {
        $difference = $this->getYearsAndDaysDifferenceArray($startDate, $endDate);
        return $difference['years'].' Years '.$difference['days'].' Days';
    }
    
    
}

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