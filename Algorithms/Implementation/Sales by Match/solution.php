<?php

/*
 * Complete the 'sockMerchant' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. INTEGER_ARRAY ar
 */

function sockMerchant($n, $ar) {
    // Write your code here
    $pairs = array();
    $pairsAmount = 0;
    for ($i=0; $i<$n; $i++) {
        if (in_array($ar[$i],$pairs)) {            
            array_splice($pairs,array_search($ar[$i],$pairs),1);
            $pairsAmount++;
        } else {
            array_push($pairs,$ar[$i]);
        }
    }
    return $pairsAmount;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$ar_temp = rtrim(fgets(STDIN));

$ar = array_map('intval', preg_split('/ /', $ar_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = sockMerchant($n, $ar);

fwrite($fptr, $result . "\n");

fclose($fptr);
