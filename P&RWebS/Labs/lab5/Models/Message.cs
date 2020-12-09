using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace lab5.Models
{
    public class Message
    {
        public string Id { get; set; }
        public string Author { get; set; }
        public string Text { get; set; }
        public Int64 Date { get; set; }
    }
}
