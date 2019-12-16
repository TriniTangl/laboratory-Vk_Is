import express from 'express';
import nodeCmd from 'node-cmd';

const app = express();
const port = 3000;
const jsonParser = express.json();

app.use(function (req, res, next) {
    res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT,    PATCH, DELETE');
    res.setHeader('Access-Control-Allow-Headers', 'X-Requested-With,content-type');
    res.setHeader('Access-Control-Allow-Credentials', 'true');
    next();
});
app.post('/rgr', jsonParser, (req, res) => {
    console.log(req.body);
    if (req.body) {
        nodeCmd.get(req.body.command, (error, data, stderr) => {
            res.json({
                result: data,
                error: error
            });
        })
    } else {
        return res.status(401).json({message: `Doesn't get any data`});
    }
});
app.listen(port, err => {
    if (err) {
        return console.log(err);
    }
    return console.log(`server is listening on port:${port}`)
});
