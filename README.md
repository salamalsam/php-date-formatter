# PHP Date Formatter Package Documentation

## Introduction

This PHP Date Formatter package provides convenient methods for formatting dates, calculating date differences, and handling timestamps in PHP applications.

## Installation

You can install this package via Composer:<br>
<code>composer require developeraio/date-formatter</code>

### Usage
Instantiate the Date Formatter class and utilize its methods as needed.

### Constructor
The constructor initializes the Date Formatter with default format and timezone settings.<br>
<code>public function __construct($defaultFormat = "Y-m-d H:i:s", $defaultTimezone = "UTC")</code>

### formatDateWithTimeStamp
Formats a Unix timestamp according to the specified format and timezone.<br>
<code>public function formatDateWithTimeStamp($timestamp, $format = null, $timezone = null)</code>

### formatDate
Formats a date string according to the specified format and timezone.<br>
<code>public function formatDate($dateString, $format = null, $timezone = null)</code>

### getDaysDifference
Calculates the number of days between two timestamps.<br>
<code>public function getDaysDifference($startTimestamp, $endTimestamp)</code>

### getHoursDifference
Calculates the number of hours between two timestamps.<br>
<code>public function getHoursDifference($startTimestamp, $endTimestamp)</code>

### getHoursAndMinutesDifferenceArray
Calculates the number of hours and minutes between two timestamps and returns an array.<br>
<code>public function getHoursAndMinutesDifferenceArray($startTimestamp, $endTimestamp)</code>

### getHoursAndMinutesDifferenceString
Calculates the number of hours and minutes between two timestamps and returns a formatted string.<br>
<code>public function getHoursAndMinutesDifferenceString($startTimestamp, $endTimestamp)</code>

### getYearsAndDaysDifferenceArray
Calculates the number of years and remaining days between two dates and returns an array.<br>
<code>public function getYearsAndDaysDifferenceArray($startDate, $endDate)</code>

### getYearsAndDaysDifferenceString
Calculates the number of years and remaining days between two dates and returns a formatted string.<br>
<code>public function getYearsAndDaysDifferenceString($startDate, $endDate)</code>

## Conclusion
This PHP Date Formatter package offers convenient methods for handling date and time-related operations in PHP applications.

This documentation provides clear explanations of each method available in the PHP Date Formatter package, allowing users to understand its usage and functionality easily when reading the README.md file on GitHub. Adjust the package name and namespace as necessary based on your specific implementation.



