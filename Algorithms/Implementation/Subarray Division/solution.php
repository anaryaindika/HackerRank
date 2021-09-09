<?php

/*
 * Complete the 'birthday' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY s
 *  2. INTEGER d
 *  3. INTEGER m
 */

function birthday($s, $d, $m) {
    // Write your code here        
    $count = 0;    
    $arr_size = count($s);
    for ($i=0;$i<$arr_size;$i++) {
        $sum = 0;
        if ($i+$m > $arr_size) {
            break;
        } else {
            for ($j=$i;$j<$i+$m;$j++) {
                $sum += $s[$j];
            }
            if ($sum == $d) {
                $count++;
            }
        }
    }    
    return $count;    
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$s_temp = rtrim(fgets(STDIN));

$s = array_map('intval', preg_split('/ /', $s_temp, -1, PREG_SPLIT_NO_EMPTY));

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$d = intval($first_multiple_input[0]);

$m = intval($first_multiple_input[1]);

$result = birthday($s, $d, $m);

fwrite($fptr, $result . "\n");

fclose($fptr);
