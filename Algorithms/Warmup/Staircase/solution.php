<?php

/*
 * Complete the 'staircase' function below.
 *
 * The function accepts INTEGER n as parameter.
 */

function staircase($n) {
    // Write your code here
    for ($i=0; $i<$n; $i++) {
        for ($j=0; $j<($n-1)-$i; $j++) {
            echo " ";
        }
        for ($j=0; $j<$i+1; $j++) {
            if ($j == $i) {
                echo "#\n";
            } else {
                echo "#";
            }
        }
    }
}

$n = intval(trim(fgets(STDIN)));

staircase($n);
