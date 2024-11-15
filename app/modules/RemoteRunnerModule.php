<?php

/**
 * This class represents your module
 */
class RemoteRunnerModule {
     /**
     * @param $code
     * @return string
     * @throws \Exception
     */
    public static function runCode($code)
    {
        try {
            return static::request($code);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param $code
     * @return string
     * @throws \Exception
     */
    public static function request($code)
    {
        try {
            $ch = curl_init();

            $header = [
                'Content-Type: application/json'
            ];

            $data = [
                'code' => $code,
                'auth' => env('CE_AUTH', '')
            ];

            curl_setopt($ch, CURLOPT_URL, env('CE_REMOTE') . '/code/run');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

            $response = curl_exec($ch);

            $curlerr = curl_error($ch);
            if ((is_string($curlerr)) && (strlen($curlerr) > 0)) {
                throw new \Exception($curlerr, curl_errno($ch));
            }

            curl_close($ch);

            $data = json_decode($response);
            if ((!isset($data->code)) || ($data->code != 200)) {
                throw new \Exception('Request failed: ' . print_r($response, true));
            }

            return $data->output;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
