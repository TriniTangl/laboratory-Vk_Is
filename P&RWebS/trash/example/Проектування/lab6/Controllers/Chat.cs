using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Logging;

namespace lab6.Controllers
{
    [ApiController]
    [Route("[controller]")]
    public class Chat : ControllerBase
    {
        string path = @"/home/sasha/MEGAsync/Навчання 1к 1с магістартура/Проектування/lab6/text.txt";
        
        List<string> users = new List<string>();
        String last = "";

         // GET api/values/5
        [Route("send/{name}/{massage}")]
        public string Send(String name,String massage)
        {
            this.last = "["+DateTime.Now.ToString("t")+"]"+name+":"+massage;
            using (StreamWriter sw = new StreamWriter(path, false, System.Text.Encoding.Default))
                {
                    sw.WriteLine(last);
                }

            return "ok";
        }
        
        [Route("last")]
        public string GetLast()
        {
            using (StreamReader sr = new StreamReader(path))
                {
                    last= sr.ReadToEnd();
                }
            return this.last;
        }
    }
}
