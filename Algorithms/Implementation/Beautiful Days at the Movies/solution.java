import java.io.*;
import java.math.*;
import java.security.*;
import java.text.*;
import java.util.*;
import java.util.concurrent.*;
import java.util.function.*;
import java.util.regex.*;
import java.util.stream.*;
import static java.util.stream.Collectors.joining;
import static java.util.stream.Collectors.toList;

class Result {

    /*
     * Complete the 'beautifulDays' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts following parameters:
     *  1. INTEGER i
     *  2. INTEGER j
     *  3. INTEGER k
     */

    public static int beautifulDays(int i, int j, int k) {
        /* Variables.
         * INTEGER startingDay : starting day in number.
         * INTEGER endingDay : ending day in number.
         * INTEGER divisor : the divisor.
         * INTEGER beautifulNumberAmount : amount of beautiful number (the absolute difference of the day in number and it's reverse divisible by the divisor).
         * STRINGBUILDER reverseDay : the reverse number of the day.
         * INTEGER absDifference : the absolute difference of the day in number and it's reverse.     
        */
        int startingDay = i, endingDay = j, divisor = k, beautifulNumberAmount = 0;
        
        for (int day=startingDay; day<=endingDay; day++) {
            // Reverse the number.
            StringBuilder reverseDay = new StringBuilder();
            reverseDay.append(String.valueOf(day));
            reverseDay.reverse();
            // Determine the absolute difference.
            int absDifference = Math.abs(day-Integer.valueOf(reverseDay.toString()));
            /* Check if number is beautiful (absolute difference divisible by divisor).
             * Add the beautiful number amount if number is beautiful.
            */
            if (absDifference%divisor == 0) {
                beautifulNumberAmount++;
            }
        }
        return beautifulNumberAmount;
    }

}

public class Solution {
    public static void main(String[] args) throws IOException {
        BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(System.in));
        BufferedWriter bufferedWriter = new BufferedWriter(new FileWriter(System.getenv("OUTPUT_PATH")));

        String[] firstMultipleInput = bufferedReader.readLine().replaceAll("\\s+$", "").split(" ");

        int i = Integer.parseInt(firstMultipleInput[0]);

        int j = Integer.parseInt(firstMultipleInput[1]);

        int k = Integer.parseInt(firstMultipleInput[2]);

        int result = Result.beautifulDays(i, j, k);

        bufferedWriter.write(String.valueOf(result));
        bufferedWriter.newLine();

        bufferedReader.close();
        bufferedWriter.close();
    }
}
