using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.IO;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Logging;
using rgr.Models;

namespace rgr.Controllers
{
    public class HomeController : Controller
    {
        private readonly ILogger<HomeController> _logger;

        public HomeController(ILogger<HomeController> logger)
        {
            _logger = logger;
        }

        public IActionResult Index()
        {
            return View();
        }

        public IActionResult Privacy()
        {
            return View();
        }

        [ResponseCache(Duration = 0, Location = ResponseCacheLocation.None, NoStore = true)]
        public IActionResult Error()
        {
            return View(new ErrorViewModel { RequestId = Activity.Current?.Id ?? HttpContext.TraceIdentifier });
        }


         string path = @"/home/sasha/MEGAsync/Навчання 1к 1с магістартура/Проектування/rgr/";
        
        List<string> users = new List<string>();
        String last = "";

         // GET api/values/5
        [Route("readfile/{name}")]
        public string Send(String name)
        {
            
            using (StreamReader sr = new StreamReader(path+name+".txt"))
                {
                    last= sr.ReadToEnd();
                }

            return last;
        }
    }
}
