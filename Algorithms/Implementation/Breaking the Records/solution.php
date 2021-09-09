<?php

/*
 * Complete the 'breakingRecords' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts INTEGER_ARRAY scores as parameter.
 */

function breakingRecords($scores) {
    // Write your code here
    $count = [0,0];
    $min = $scores[0];
    $max = $scores[0];
    for ($i=1;$i<count($scores);$i++) {
        if ($scores[$i] > $max) {
            $max = $scores[$i];
            $count[0]++;
        }
        if ($scores[$i] < $min) {
            $min = $scores[$i];
            $count[1]++;
        }        
    }
    return $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$scores_temp = rtrim(fgets(STDIN));

$scores = array_map('intval', preg_split('/ /', $scores_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = breakingRecords($scores);

fwrite($fptr, implode(" ", $result) . "\n");

fclose($fptr);
