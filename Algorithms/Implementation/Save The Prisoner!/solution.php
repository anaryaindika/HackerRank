<?php

/*
 * Complete the 'saveThePrisoner' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. INTEGER m
 *  3. INTEGER s
 */

function saveThePrisoner($n, $m, $s) {
    /*
     * Variables initialization.
     * INTEGER numOfPrisoners: the number of prisoners.
     * INTEGER numOfSweets: the number of sweets.
     * INTEGER startingSeat: the chair number to start passing out treats at.
    */
    $numOfPrisoners = $n;
    $numOfSweets = $m;
    $startingSeat = $s;        
    
    /*
     * To determine the chair number to warn, determine the remaining sweets of the iteration before the last iteration.
     * The remainder of sweets will indicate which prisoner to be warned.
     * If remainder of sweets is 0, set the number to the last chair number since index 0 is not exist.
    */    
    $seatToWarn = ($startingSeat - 1 + $numOfSweets) % $numOfPrisoners;
    if ($seatToWarn == 0) {
        $seatToWarn = $numOfPrisoners;
    }
    
    return $seatToWarn;    
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

    $n = intval($first_multiple_input[0]);

    $m = intval($first_multiple_input[1]);

    $s = intval($first_multiple_input[2]);

    $result = saveThePrisoner($n, $m, $s);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
