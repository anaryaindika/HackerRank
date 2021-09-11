<?php

/*
 * Complete the 'countingValleys' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER steps
 *  2. STRING path
 */

function countingValleys($steps, $path) {
    // Write your code here
    $prevAltitude = 0;
    $currAltitude = 0;
    $valleyAmount = 0;
    for ($i=0; $i<$steps; $i++) {
        $prevAltitude = $currAltitude;
        if ($path[$i] == 'D') {
            $currAltitude--;
        } else {
            $currAltitude++;
        }
        if ($currAltitude == 0 && $prevAltitude < 0) {
            $valleyAmount++;
        }
    }
    return $valleyAmount;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$steps = intval(trim(fgets(STDIN)));

$path = rtrim(fgets(STDIN), "\r\n");

$result = countingValleys($steps, $path);

fwrite($fptr, $result . "\n");

fclose($fptr);
