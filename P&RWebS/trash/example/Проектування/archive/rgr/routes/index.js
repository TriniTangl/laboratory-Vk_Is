var express = require('express');
var router = express.Router();
number = -1;
ramdomNum = Math.floor(Math.random() * Math.floor(100));
console.log(ramdomNum);
router.get('/number/:x', function(req, res, next) {
  if(parseInt(req.params.x) === ramdomNum)
    res.send("Вітаємо ви відгадали число! Відповідь "+req.params.x);
  else 
    res.send("Число "+parseInt(req.params.x)+" є не правильним(");
});

module.exports = router;
