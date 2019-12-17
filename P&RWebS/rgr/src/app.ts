import nodeCmd from 'node-cmd';
import express, {Express} from 'express';

const app: Express = express();
const port: number = 3000;
const jsonParser: any = express.json();

app.use((req, res, next) => {
    res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT,    PATCH, DELETE');
    res.setHeader('Access-Control-Allow-Headers', 'X-Requested-With,content-type');
    res.setHeader('Access-Control-Allow-Credentials', 'true');
    next();
});
app.post('/rgr', jsonParser, (req, res) => {
    if (req.body) {
        nodeCmd.get(req.body.command, (error, data, stderr) => {
            nodeCmd.get('cd', (errorDir, dataDir, stderrDir) => {
                res.json({
                    dir: dataDir,
                    result: data,
                    error: error
                });
            });
        });
    } else {
        return res.status(401).json({message: `Doesn't get any data`});
    }
});
app.listen(port, err => {
    if (err) {
        return console.log(err);
    }
    return console.log(`Server is listening on port:${port}`)
});
