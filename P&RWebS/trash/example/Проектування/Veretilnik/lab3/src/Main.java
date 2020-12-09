import org.json.*;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.lang.reflect.Array;
import java.net.HttpURLConnection;
import java.net.URL;

public class Main {

    public static void main(String[] args) throws IOException {
        String url = "https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5";

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
        System.out.println("Наличный курс ПриватБанка");
        System.out.println("Покупка");
        JSONArray arr = new JSONArray(response.toString());
        for (int i = 0; i < arr.length()-1; i++){
            String curency = arr.getJSONObject(i).getString("ccy");
            String price = arr.getJSONObject(i).getString("buy");
            System.out.println(curency+": "+price);
        }
        System.out.println("Продажа");
        JSONArray arr2 = new JSONArray(response.toString());
        for (int i = 0; i < arr2.length()-1; i++){
            String curency = arr.getJSONObject(i).getString("ccy");
            String price = arr.getJSONObject(i).getString("sale");
            System.out.println(curency+": "+price);
        }

    }
}
