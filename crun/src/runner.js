import 'dotenv/config';
import fs from 'fs';
import path from 'path';
import { unlink } from 'fs/promises';
import { randomBytes } from 'crypto';
import express from 'express';
import { exec } from 'child_process';

const app = express();

app.use(express.json());

function remoteAddress(req)
{
    const forwardedFor = req.headers['x-forwarded-for'];
    const clientIp = forwardedFor ? forwardedFor.split(',')[0] : req.connection.remoteAddress;

    return clientIp;
}

app.post('/code/run', (req, res) => {
    const remoteIp = remoteAddress(req);
    const { code, auth } = req.body;
    
    if ((process.env.RUNNER_AUTHTOKEN.length > 0) && (process.env.RUNNER_AUTHTOKEN !== auth)) {
        console.log(`Unauthorized request from ${remoteIp}`);
        return res.status(401).send({ code: 401, msg: 'Unauthorized: Authentication required, but invalid token provided' });
    }

    if (!code) {
        return res.status(500).send({ code: 500, msg: 'Script code is required' });
    }

    const fileName = `${randomBytes(8).toString('hex')}.dnys`;
    const fullPath = path.join(process.cwd(), 'scripts', fileName);
    
    fs.writeFileSync(
        fullPath,
        code,
        {
            encoding: 'utf8',
            flag: 'a'
        }
    );
    
    const command = `${process.env.RUNNER_CMDLINE}`.replace('{%SCRIPT_FILE%}', fileName);
    
    exec(command, (error, stdout, stderr) => {
        if (error) {
            console.error(`Error executing command: ${error.message}`);
            return res.status(500).send({ code: 500, error: error.message, stderr });
        }

        unlink(fullPath);

        console.log(`Successful request from ${remoteIp}`);

        res.send({ code: 200, output: stdout });
    });
});

app.listen(process.env.RUNNER_PORT, () => {
    console.log(`Code runner is listening on http://localhost:${process.env.RUNNER_PORT}\r\n`);

    console.log(`Cmdline: ${process.env.RUNNER_CMDLINE}`);
    console.log(`Port: ${process.env.RUNNER_PORT}`);
    console.log(`Auth: ${process.env.RUNNER_AUTHTOKEN}\r\n`);
});