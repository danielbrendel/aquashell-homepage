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
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public static function getFromCategory($id)
    {
        try {
            return static::raw('SELECT * FROM `@THIS` where category = ?', [$id]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param $id
     * @return int
     * @throws \Exception
     */
    public static function getCategoryCount($id)
    {
        try {
            return static::raw('SELECT COUNT(*) AS count FROM `@THIS` where category = ?', [$id])->first()?->get('count');
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public static function getFromId($id)
    {
        try {
            return static::raw('SELECT * FROM `@THIS` where id = ?', [$id])->first();
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