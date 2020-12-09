using System;
using System.Collections.Generic;
using System.Linq;
using System.Text.Json;
using System.Threading.Tasks;
using lab5.Models;
using Microsoft.AspNetCore.Mvc;

namespace lab5.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class ChatController : ControllerBase
    {
        [HttpGet]
        public List<Message> Get()
        {
            string jsonString = System.IO.File.ReadAllText("./data/db.json");
            MessagesList messagesList = JsonSerializer.Deserialize<MessagesList>(jsonString);

            return messagesList.Messages;
        }

        [HttpPost]
        public List<Message> Post([FromBody] Message message)
        {
            string jsonString = System.IO.File.ReadAllText("./data/db.json");
            MessagesList messagesList = JsonSerializer.Deserialize<MessagesList>(jsonString);
            Message pushMessage = message;
            pushMessage.Text = message.Text.Substring(0, message.Text.Length <= 40 ? message.Text.Length : 40);
            messagesList.Messages.Add(pushMessage);
            jsonString = JsonSerializer.Serialize(messagesList);
            System.IO.File.WriteAllText("./data/db.json", jsonString);

            return messagesList.Messages;
        }
    }
}
