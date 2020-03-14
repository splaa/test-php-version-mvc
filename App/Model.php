<?php


namespace App;


abstract class Model
{
    public const TABLE = '';

    public $id;


    public static function findAll()
    {
        $db = new Db();
        $query = 'select * from '. static::TABLE;
        return $db->query($query ,
            [],
            static::class);
    }

    /**
     * @return mixed
     */
    public static function findById($id)
    {
        $db = new Db();
        $query = 'select * from '. static::TABLE . ' where id=' . $id;
        $res = $db->query($query ,
            [],
            static::class);
        return $res ? $res : false;
    }

}
