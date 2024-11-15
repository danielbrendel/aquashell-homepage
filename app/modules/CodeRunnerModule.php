<?php

/**
 * This class represents your module
 */
class CodeRunnerModule {
    /**
     * @param $code
     * @return string
     * @throws \Exception
     */
    public static function runCode($code)
    {
        try {
            $cmdline = env('CE_CMDLINE');

            $temp_script = md5(random_bytes(55) . date('Y-m-d H:i:s')) . '.dnys';
            file_put_contents(public_path() . '/scripts/' . $temp_script, $code);

            $command = str_replace('{%SCRIPT_FILE%}', public_path() . '/scripts/' . $temp_script, $cmdline);
            $output = [];
            $returnVar = 0;

            exec($command, $output, $returnVar);

            $response = implode("\n", $output);

            unlink(public_path() . '/scripts/' . $temp_script);

            return $response;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
