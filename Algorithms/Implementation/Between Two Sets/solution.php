<?php

/*
 * Complete the 'getTotalX' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY a
 *  2. INTEGER_ARRAY b
 */

function getTotalX($a, $b) {
    // Write your code here
    $consideredInts = array();
    $resultAmount = 0;
    for ($i=0; $i<=min($b); $i++) {
        $isFactor = true;
        foreach ($a as $factor) {
            if ($i%$factor != 0) {
                $isFactor = false;
                break;
            }
        }
        if ($isFactor && !in_array($i,$consideredInts) && $i>=$a[count($a)-1]) {
            array_push($consideredInts,$i);
        }
    }
    foreach ($consideredInts as $factor) {
        $isFactor = true;
        foreach ($b as $consideredInt) {
            if ($consideredInt%$factor != 0) {
                $isFactor = false;
                break;
            }
        }
        if ($isFactor) {
            $resultAmount++;
        }
    }
    return $resultAmount;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);

$m = intval($first_multiple_input[1]);

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$brr_temp = rtrim(fgets(STDIN));

$brr = array_map('intval', preg_split('/ /', $brr_temp, -1, PREG_SPLIT_NO_EMPTY));

$total = getTotalX($arr, $brr);

fwrite($fptr, $total . "\n");

fclose($fptr);
