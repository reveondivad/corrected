const express = require('express');
const router = express.Router()

const { exec, spawn }  = require('child_process');

router.post('/ping', (req,res) => {
    let url = req.body.url;
    if (typeof url !== ""string"") {
        return res.status(400).send(""Invalid URL"");
    }
    url = url.replace(/[^a-zA-Z0-9\:\/\.]/g, '');
    exec(`ping -c 1 ${url}`, (error) => {
        if (error) {
            return res.send('error');
        }
        res.send('pong')
    })
    
})

router.post('/gzip', (req,res) => {
    let filePath = req.query.file_path;
    if (typeof filePath !== ""string"") {
        return res.status(400).send(""Invalid file path"");
    }
    filePath = filePath.replace(/[^a-zA-Z0-9\/\.\-\_]/g, '');
    exec(
        `gzip ${filePath}`,
        function (err, data) {
          console.log('err: ', err)
          console.log('data: ', data);
          res.send('done');
    });
})

router.get('/run', (req,res) => {
   let cmd = req.params.cmd;
   if (typeof cmd !== ""string"") {
        return res.status(400).send(""Invalid command"");
    }
   cmd = cmd.replace(/[^a-zA-Z0-9\/\.\-\_]/g, '');
   runMe(cmd,res)
});

function runMe(cmd,res){
    const cmdRunning = spawn(cmd, []);
    cmdRunning.on('close', (code) => {
        res.send(`child process exited with code ${code}`);
    });
}

module.exports = router