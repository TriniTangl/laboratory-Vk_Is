var express = require('express');
var router = express.Router();
const path = require('path');

/* GET home page. */
router.get('/', function(req, res, next) {
  res.sendFile(path.join(__dirname+'/index.html'));
});

router.post('/save',function(req, res, next) {
    console.log(req.body);
    res.setHeader('content-type', 'text/json');
    res.send('<?xml version="1.0" encoding="UTF-8"?>\n'+
    '<x1>'+req.body.x1+'</x1>\n'+
    '<x2>'+req.body.x2+'</x2>\n'+
    '<y1>'+req.body.y1+'</y1>\n'+
    '<y2>'+req.body.y2+'</y2>\n');
});

module.exports = router;
