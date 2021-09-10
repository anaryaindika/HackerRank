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
     * Complete the 'dayOfProgrammer' function below.
     *
     * The function is expected to return a STRING.
     * The function accepts INTEGER year as parameter.
     */

    public static String dayOfProgrammer(int year) {
    // Write your code here
        String finalDate = "";        
        SimpleDateFormat formatter = new SimpleDateFormat("dd.MM.yyyy");
        Calendar calendar = Calendar.getInstance();
        try {                        
            Date date = new Date();
            if (year == 1918) {                
                date = formatter.parse("14.02.1918");
                calendar.setTime(date);
                calendar.add(Calendar.DATE,256-32);
            } else {                                
                date = formatter.parse("01.03."+year);
                calendar.setTime(date);
                if (year < 1918) {
                    if (year%4 == 0) {
                        calendar.add(Calendar.DATE,256-61);
                    } else {
                        calendar.add(Calendar.DATE,256-60);
                    }
                } else {
                    if (year%400==0 || (year%4==0 && year%100!=0)) {
                        calendar.add(Calendar.DATE,256-61);
                    } else {
                        calendar.add(Calendar.DATE,256-60);
                    }
                }                
            }
            date = calendar.getTime();
            finalDate = formatter.format(date);
        } catch (ParseException e) {
            e.printStackTrace();
        }        
        return finalDate;
    }          

}

public class Solution {
    public static void main(String[] args) throws IOException {
        BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(System.in));
        BufferedWriter bufferedWriter = new BufferedWriter(new FileWriter(System.getenv("OUTPUT_PATH")));

        int year = Integer.parseInt(bufferedReader.readLine().trim());

        String result = Result.dayOfProgrammer(year);

        bufferedWriter.write(result);
        bufferedWriter.newLine();

        bufferedReader.close();
        bufferedWriter.close();
    }
}
