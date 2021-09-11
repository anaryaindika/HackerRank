<?php

/*
 * Complete the 'pickingNumbers' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY a as parameter.
 */

function pickingNumbers($a) {
    // Write your code here
    $elements = array_count_values($a);
    $maxLength = 0;
    foreach ($a as $element) {                
        $left = array_key_exists($element,$elements) ? $elements[$element]+$elements[$element-1] : $elements[$element];
        $right = array_key_exists($element,$elements) ? $elements[$element]+$elements[$element+1] : $elements[$element];
        if ($left > $maxLength) {
            $maxLength = $left;
        }
        if ($right > $maxLength) {
            $maxLength = $right;
        }
    }
    return $maxLength;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$a_temp = rtrim(fgets(STDIN));

$a = array_map('intval', preg_split('/ /', $a_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = pickingNumbers($a);

fwrite($fptr, $result . "\n");

fclose($fptr);
