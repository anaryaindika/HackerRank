<?php

/*
 * Complete the 'beautifulDays' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER i
 *  2. INTEGER j
 *  3. INTEGER k
 */

function beautifulDays($i, $j, $k) {
    /* Variables.
     * INTEGER startingDay : starting day in number.
     * INTEGER endingDay : ending day in number.
     * INTEGER divisor : the divisor.
     * INTEGER beautifulNumberAmount : amount of beautiful number (the absolute difference of the day in number and it's reverse divisible by the divisor).
     * STRING reverseDay : the reverse number of the day.
     * INTEGER absDifference : the absolute difference of the day in number and it's reverse.     
    */
    $startingDay = $i;
    $endingDay = $j;
    $divisor = $k;
    $beautifulNumberAmount = 0;
        
    for ($day=$startingDay; $day<=$endingDay; $day++) {
        // Reverse the number.
        $reverseDay = strrev($day);
        // Detemine the absolute difference.
        $absDifference = abs($day-$reverseDay);        
        /* Check if number is beautiful (divisible by divisor).
         * Add the beautiful number amount if number is beautiful.
        */
        if ($absDifference%$divisor == 0) {
            $beautifulNumberAmount++;
        }
    }        
    return $beautifulNumberAmount;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$i = intval($first_multiple_input[0]);

$j = intval($first_multiple_input[1]);

$k = intval($first_multiple_input[2]);

$result = beautifulDays($i, $j, $k);

fwrite($fptr, $result . "\n");

fclose($fptr);
