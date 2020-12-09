using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.Xml;
using lab4.Models;
using Microsoft.AspNetCore.Mvc;

namespace lab4.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class XMLController : ControllerBase
    {
        [HttpGet]
        public string Get()
        {
            XmlDocument document = new XmlDocument();
            document.Load("./dataset.xml");
            
            return document.InnerXml;
        }

        [HttpPost]
        public string Post([FromBody] User user)
        {
            XmlDocument document = new XmlDocument();
            document.Load("./dataset.xml");
            XmlNode newUser = document.CreateElement("User");
            XmlNode id = document.CreateElement("Id");
            id.InnerText = user.Id;
            newUser.AppendChild(id);
            XmlNode name = document.CreateElement("Name");
            name.InnerText = user.Name;
            newUser.AppendChild(name);
            XmlNode city = document.CreateElement("City");
            city.InnerText = user.City;
            newUser.AppendChild(city);
            XmlNode email = document.CreateElement("Email");
            email.InnerText = user.Email;
            newUser.AppendChild(email);
            document.DocumentElement.AppendChild(newUser);
            document.Save("./dataset.xml");

            return document.InnerXml;
        }
    }
}
