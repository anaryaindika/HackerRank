<?php

/*
 * Complete the 'pageCount' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. INTEGER p
 */

function pageCount($n, $p) {
    // Write your code here
    $totalTurnFront = floor($n/2);    
    $totalTargetTurnFront = floor($p/2);    
    $totalTargetTurnBack = $totalTurnFront-$totalTargetTurnFront;
    return min($totalTargetTurnFront,$totalTargetTurnBack);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$p = intval(trim(fgets(STDIN)));

$result = pageCount($n, $p);

fwrite($fptr, $result . "\n");

fclose($fptr);
