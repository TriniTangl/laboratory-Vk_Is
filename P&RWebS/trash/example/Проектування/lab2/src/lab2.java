import org.json.*;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.lang.reflect.Array;
import java.net.HttpURLConnection;
import java.net.URL;

public class lab2 {

    public static void main(String[] args) throws IOException {
        String url = "https://kuna.io/api/v2/tickers/btcuah";
        URL obj = new URL(url);
        HttpURLConnection connection = (HttpURLConnection) obj.openConnection();
        connection.setRequestMethod("GET");
        BufferedReader in = new BufferedReader(new InputStreamReader(connection.getInputStream()));
        String inputLine;
        StringBuffer response = new StringBuffer();
        while ((inputLine = in.readLine()) != null) {
            response.append(inputLine);
        }
        in.close();
        System.out.println("Використання відкритого апі");
        System.out.println(response.toString());

        System.out.println("\nВикористання закритого апі без параметрів авторизації");

         url = "https://kuna.io/api/v2/members/me?access_key=dV6vEJe1CO&tonce=1465850766246&signature=secret";

         obj = new URL(url);
         connection = (HttpURLConnection) obj.openConnection();

        connection.setRequestMethod("GET");

         in = new BufferedReader(new InputStreamReader(connection.getInputStream()));

         response = new StringBuffer();

        while ((inputLine = in.readLine()) != null) {
            response.append(inputLine);
        }
        in.close();
        System.out.println(response.toString());
    }
}
