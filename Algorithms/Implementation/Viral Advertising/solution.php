<?php

/*
 * Complete the 'viralAdvertising' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER n as parameter.
 */

function viralAdvertising($n) {    
    /*
     * Variables initialization.
     * INTEGER endDay: the day number to report.
     * INTEGER people: amount of people who receive the advertisement each day.
     * INTEGER likes: amount of likes each day.
     * INTEGER cumulativeLikes: cumulative amount of likes each day.
    */
    $endDay = $n;
    $people = 5;
    $likes = floor($people/2);
    $cumulativeLikes = $likes;
    /*
     * Iterate each day.
     * Detemine the amount of people who receive the advertisement each day based one amount of likes the day before.
     * Determine likes on each day based on the amount of people previously determined.
     * Count cumulative likes based on the amount of likes each day.
    */
    for ($day=2; $day<=$endDay; $day++) {
        $people = $likes*3;
        $likes = floor($people/2);
        $cumulativeLikes += $likes;
    }
    
    return $cumulativeLikes;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$result = viralAdvertising($n);

fwrite($fptr, $result . "\n");

fclose($fptr);
