﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Logging;

namespace VeretilnkLab4.Controllers
{
    [ApiController]
    [Route("WebServiceCalc")]
    public class WeatherForecastController : ControllerBase
    {
        [HttpGet]
        [Route("main")]
        public string Index()
        {
            return "Простий математичний калькулятор";
        }

        [Route("add/{n1}/{n2}")]
        public string Add(float n1,float n2)
        {
            return ""+(n1+n2);
        }

        // GET api/values/5
        [Route("subtract/{n1}/{n2}")]
        public string Subtract(float n1,float n2)
        {
            return ""+(n1-n2);
        }

        [Route("multiply/{n1}/{n2}")]
        public string Multiply(float n1,float n2)
        {
            return ""+(n1*n2);
        }

        [Route("divide/{n1}/{n2}")]
        public string Divide(float n1,float n2)
        {
            return ""+(n1/n2);
        }
    }
}
