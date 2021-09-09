<?php

/*
 * Complete the 'gradingStudents' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts INTEGER_ARRAY grades as parameter.
 */

function gradingStudents($grades) {
    // Write your code here    
    for ($i=0;$i<count($grades);$i++) {
        if ($grades[$i]>=38) {            
            $round_num = $grades[$i];
            while ($round_num%5!=0) {
                $round_num++;
            }
            if ($round_num-$grades[$i]<3) {
                $grades[$i] = $round_num;
            }            
        }        
    }
    return $grades;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$grades_count = intval(trim(fgets(STDIN)));

$grades = array();

for ($i = 0; $i < $grades_count; $i++) {
    $grades_item = intval(trim(fgets(STDIN)));
    $grades[] = $grades_item;
}

$result = gradingStudents($grades);

fwrite($fptr, implode("\n", $result) . "\n");

fclose($fptr);
