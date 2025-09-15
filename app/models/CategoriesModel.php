<?php

/**
 * This class extends the base model class and represents your associated table
 */ 
class CategoriesModel extends \Asatru\Database\Model {
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
     * @param $name
     * @return mixed
     * @throws \Exception
     */
    public static function getCategoryByName($name)
    {
        try {
            return static::raw('SELECT * FROM `@THIS` WHERE LOWER(name) = ?', [strtolower($name)])->first();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}