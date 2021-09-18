<?php

/*
 * Complete the 'utopianTree' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER n as parameter.
 */

function utopianTree($n) {
    // Initialize height of the planted tree and the beginning of cycle.    
    $height = 1;
    $cycle = 0;
    $endCycle = $n;
    // Iterate through each cycle.    
    while ($cycle < $endCycle) {                
        if ($cycle%2 == 0) {
            // Double the height if cycle is even numbered (spring).
            $height *= 2;
        } else {
            // Plus by one if cycle is odd numbered (summer).
            $height++;
        }        
        $cycle++;
    }    
    return $height;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $result = utopianTree($n);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
