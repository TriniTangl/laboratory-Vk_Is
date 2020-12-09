using System;
using System.Net.Http;

namespace lab5Client
{
    class Program
    {
        static async System.Threading.Tasks.Task Main(string[] args)
        {
            HttpClient client = new HttpClient();
            Console.WriteLine("Клієнт для веб-сервісу");
            while(true){
                Console.WriteLine("Оберіть метод:");
                Console.WriteLine("1. /getTime");
                Console.WriteLine("2. /getDate");
                Console.WriteLine("3. /getDatetime");
                string varint = Console.ReadLine();
                int i;
                Int32.TryParse(varint,out i);
                if (i == 1)
                {
                    HttpResponseMessage response = await client.GetAsync("http://localhost:5000/getTime");
                    response.EnsureSuccessStatusCode();
                    string responseBody = await response.Content.ReadAsStringAsync();
                    Console.WriteLine("Відповідь сервера:" + responseBody);
                } else if (i == 2){
                    HttpResponseMessage response = await client.GetAsync("http://localhost:5000/getDate");
                    response.EnsureSuccessStatusCode();
                    string responseBody = await response.Content.ReadAsStringAsync();
                    Console.WriteLine("Відповідь сервера:" + responseBody);
                } else{
                    HttpResponseMessage response = await client.GetAsync("http://localhost:5000/getDatetime");
                    response.EnsureSuccessStatusCode();
                    string responseBody = await response.Content.ReadAsStringAsync();
                    Console.WriteLine("Відповідь сервера:" + responseBody);
                }
            }
        }
    }
}
