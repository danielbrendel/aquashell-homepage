import 'dotenv/config';
import fs from 'fs';
import path from 'path';
import { unlink } from 'fs/promises';
import { randomBytes } from 'crypto';
import express from 'express';
import { exec } from 'child_process';

const app = express();

app.use(express.json());

app.post('/code/run', (req, res) => {
    const { code } = req.body;

    if (!code) {
        return res.status(500).send({ code: 500, msg: 'Script code is required' });
    }

    const fileName = `${randomBytes(8).toString('hex')}.dnys`;
    const fullPath = path.join(process.cwd() + '/scripts/', fileName);
    
    fs.writeFileSync(
        fullPath,
        code,
        {
            encoding: 'utf8',
            flag: 'a'
        }
    );

    const command = `${process.env.RUNNER_CMDLINE}`.replace('{%SCRIPT_FILE%}', fullPath);
    
    exec(command, (error, stdout, stderr) => {
        if (error) {
            console.error(`Error executing command: ${error.message}`);
            return res.status(500).send({ code: 500, error: error.message, stderr });
        }

        unlink(fullPath);

        res.send({ code: 200, output: stdout });
    });
});

app.listen(process.env.RUNNER_PORT, () => {
    console.log(`Code runner is listening on http://localhost:${process.env.RUNNER_PORT}`);
});