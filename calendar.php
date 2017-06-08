<?php
/**
 * Created by PhpStorm.
 * User: Urvashi Sahai
 * Date: 6/8/2017
 * Time: 10:47 AM
 */
//User input for year
$handle = fopen ("php://stdin","r");
$line = fgets($handle);
//no of days in 8 months in non- leap year
$no_days_eight_months=243;
$year=$line;
$month=9;
$day=0;
if($year<1918){
    //check lean year in Julian Calendar
if($line%4==0){
    //no of days in 8 months in leap year in Russian calendar
    $no_days_eight_months=244;
}
}
else if($year==1918){
    //no of days in 8 months in 1918
    $no_days_eight_months=230;
}
else{

if($line%400==0 || ($line%4==0 && $line%100!=0)){
    //no of days in 8 months in Gregorian calendar
    $no_days_eight_months=244;

}
}
$day=256-$no_days_eight_months;
$full_date=$day.'.'.$month.'.'.$year;
echo $full_date;