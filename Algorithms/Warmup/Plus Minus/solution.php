<?php

/*
 * Complete the 'plusMinus' function below.
 *
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function plusMinus($arr) {
    // Write your code here
    $n = count($arr);
    $elements = [0,0,0];      
    for ($i=0; $i<$n; $i++) {
        if ($arr[$i] > 0) {
            $elements[0]++;
        } else if ($arr[$i] < 0) {
            $elements[1]++;
        } else {
            $elements[2]++;
        }
    }
    for ($i=0; $i<count($elements); $i++) {        
        echo number_format($elements[$i]/$n,6)."\n";
    }    
}

$n = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

plusMinus($arr);
