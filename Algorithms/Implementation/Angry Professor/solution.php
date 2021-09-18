<?php

/*
 * Complete the 'angryProfessor' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts following parameters:
 *  1. INTEGER k
 *  2. INTEGER_ARRAY a
 */

function angryProfessor($k, $a) {
    // Write your code here
    /* Initialize variables.
     *  1. INTEGER threshold : threshold of mininum attendess.
     *  2. ARRAY INTEGER arrivalTimes : arrival time of each student.
     *  3. INTEGER onTimeStudent : amount of on time student.
    */
    $threshold = $k;
    $arrivalTimes = $a;
    $onTimeStudent = 0;    
        
    /* Iterate through each student arrival time and count how many student are on time.
     * Check if threshold is fulfilled. Return "YES if threshold fulfilled."
    */
    for ($i=0; $i<count($arrivalTimes); $i++) {
        if ($arrivalTimes[$i] <= 0) {
            $onTimeStudent++;
        }
        if ($onTimeStudent == $threshold) {
            return "NO";
        }
    }
    return "YES";
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

    $n = intval($first_multiple_input[0]);

    $k = intval($first_multiple_input[1]);

    $a_temp = rtrim(fgets(STDIN));

    $a = array_map('intval', preg_split('/ /', $a_temp, -1, PREG_SPLIT_NO_EMPTY));

    $result = angryProfessor($k, $a);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
