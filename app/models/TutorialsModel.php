<?php

/**
 * This class extends the base model class and represents your associated table
 */ 
class TutorialsModel extends \Asatru\Database\Model {
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
}