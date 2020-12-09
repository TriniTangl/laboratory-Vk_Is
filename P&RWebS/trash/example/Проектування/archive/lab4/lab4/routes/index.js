var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('index', { title: 'Express' });
});

router.get('/add/:n1/:n2/', function(req, res, next) {
  n1 = parseInt(req.params.n1)
  n2 = parseInt(req.params.n2)
  res.send(n1+' + '+n2+' = '+(n1+n2));
});

router.get('/subtract/:n1/:n2/', function(req, res, next) {
  n1 = parseInt(req.params.n1)
  n2 = parseInt(req.params.n2)
  res.send(n1+' - '+n2+' = '+(n1-n2));
});

router.get('/multiply/:n1/:n2/', function(req, res, next) {
  n1 = parseInt(req.params.n1)
  n2 = parseInt(req.params.n2)
  res.send(n1+' * '+n2+' = '+(n1*n2));
});

router.get('/divide/:n1/:n2/', function(req, res, next) {
  n1 = parseInt(req.params.n1)
  n2 = parseInt(req.params.n2)
  res.send(n1+' / '+n2+' = '+(n1/n2));
});

module.exports = router;
