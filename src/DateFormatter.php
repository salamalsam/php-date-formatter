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
