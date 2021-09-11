<?php

/*
 * Complete the 'dayOfProgrammer' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts INTEGER year as parameter.
 */

function dayOfProgrammer($year) {
    // Write your code here    
    $date;
    if ($year == 1918) {
        $date = date_create("14.02.1918");
        date_add($date, date_interval_create_from_date_string((256-32)." days"));        
    } else {
        $date = date_create("01.03.".$year);
        if ($year < 1918) {            
            if ($year%4 == 0) {            
                date_add($date, date_interval_create_from_date_string((256-61)." days"));
            } else {
                date_add($date, date_interval_create_from_date_string((256-60)." days"));
            }
        } else {            
            if ($year%400 == 0 || ($year % 4 == 0 && $year % 100 != 0)) {
                date_add($date, date_interval_create_from_date_string((256-61)." days"));
            } else {
                date_add($date, date_interval_create_from_date_string((256-60)." days"));
            }
        }        
    }
    return date_format($date, "d.m.Y");
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$year = intval(trim(fgets(STDIN)));

$result = dayOfProgrammer($year);

fwrite($fptr, $result . "\n");

fclose($fptr);
