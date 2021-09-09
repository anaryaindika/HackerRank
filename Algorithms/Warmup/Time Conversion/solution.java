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
     * Complete the 'timeConversion' function below.
     *
     * The function is expected to return a STRING.
     * The function accepts STRING s as parameter.
     */

    public static String timeConversion(String s) {
    // Write your code here        
        String[] time = s.split("(?<=\\D)(?=\\d)|(?<=\\d)(?=\\D)");        
        int hours = 0;
        if (time[0].equals("12")) {
            time[0] = "00";
        }                        
        if (time[5].equals("PM")) {            
            hours = Integer.parseInt(time[0],10)+12;
            time[0] = String.valueOf(hours);
            if (hours < 10) {
                time[0] = "0"+time[0];
            }
        }              
        return time[0]+":"+time[2]+":"+time[4];        
    }

}

public class Solution {
    public static void main(String[] args) throws IOException {
        BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(System.in));
        BufferedWriter bufferedWriter = new BufferedWriter(new FileWriter(System.getenv("OUTPUT_PATH")));

        String s = bufferedReader.readLine();

        String result = Result.timeConversion(s);

        bufferedWriter.write(result);
        bufferedWriter.newLine();

        bufferedReader.close();
        bufferedWriter.close();
    }
}
