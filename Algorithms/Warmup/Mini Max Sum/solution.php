<?php

/*
 * Complete the 'miniMaxSum' function below.
 *
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function miniMaxSum($arr) {
    // Write your code here
    $totals = [];
    for ($i=0; $i<count($arr); $i++) {
        $values = $arr;
        array_splice($values, $i, 1);
        array_push($totals, array_sum($values));
    }
    echo min($totals)." ".max($totals);
}

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

miniMaxSum($arr);
