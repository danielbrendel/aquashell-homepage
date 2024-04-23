<?php

/**
 * This class extends the base model class and represents your associated table
 */ 
class SnippetsModel extends \Asatru\Database\Model {
    /**
     * @return mixed
     * @throws \Exception
     */
    public static function getAll()
    {
        try {
            return static::all();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param $code
     * @return string
     * @throws \Exception
     */
    public static function fixTab($code)
    {
        try {
            return str_replace("\t", '    ', $code);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}