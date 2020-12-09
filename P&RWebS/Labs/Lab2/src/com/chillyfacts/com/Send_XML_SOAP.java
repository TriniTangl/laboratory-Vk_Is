package com.chillyfacts.com;

import java.io.BufferedReader;
import java.io.DataOutputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

public class Send_XML_SOAP {
    public static void main(String[] args) {
        try {
            Number num1 = 2;
            Number num2 = 3;
            makeRequest(new URL("http://www.dneonline.com/calculator.asmx"),
                    "<soap:Envelope xmlns:soap=\"http://www.w3.org/2003/05/soap-envelope\" xmlns:tem=\"http://tempuri.org/\">" +
                            "   <soap:Header/>" +
                            "   <soap:Body>" +
                            "      <tem:Add>" +
                            "         <tem:intA>" + num1 + "</tem:intA>" +
                            "         <tem:intB>" + num2 + "</tem:intB>" +
                            "      </tem:Add>" +
                            "   </soap:Body>" +
                            "</soap:Envelope>");
            makeRequest(new URL("http://www.dneonline.com/calculator.asmx"),
                    "<soap:Envelope xmlns:soap=\"http://www.w3.org/2003/05/soap-envelope\" xmlns:tem=\"http://tempuri.org/\">" +
                            "   <soap:Header/>" +
                            "   <soap:Body>" +
                            "      <tem:Add>" +
                            "         <tem:intA>" + "num1" + "</tem:intA>" +
                            "         <tem:intB>" + "num2" + "</tem:intB>" +
                            "      </tem:Add>" +
                            "   </soap:Body>" +
                            "</soap:Envelope>");
        } catch (Exception error) {
            System.out.println(error);
        }
    }

    public static void makeRequest(URL url, String message) {
        try {
            HttpURLConnection connection = (HttpURLConnection) url.openConnection();
            connection.setRequestMethod("POST");
            connection.setRequestProperty("Content-Type", "application/soap+xml;charset=UTF-8");
            connection.setDoOutput(true);
            DataOutputStream writing = new DataOutputStream(connection.getOutputStream());
            writing.writeBytes(message);
            writing.flush();
            writing.close();
            String responseStatus = connection.getResponseMessage();
            System.out.println(responseStatus);
            BufferedReader inputting = new BufferedReader(new InputStreamReader(connection.getInputStream()));
            StringBuffer response = new StringBuffer();
            String inputLine;
            while ((inputLine = inputting.readLine()) != null) {
                response.append(inputLine);
            }
            inputting.close();
            System.out.println("response: " + response.toString());
        } catch (Exception error) {
            System.out.println(error);
        }
    }
}
