<?php
namespace App;


abstract class Model
{
    const TABLE = '';

    public static function ow_find_all()
    {
        $db = new Db();
        return $db->ow_query(
            'SELECT * FROM ' . static::TABLE,
            static::class
        );
    }
}