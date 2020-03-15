<?php


namespace App;


abstract class Model
{
    public const TABLE = '';

    public $id;


    public static function findAll()
    {
        $db = new Db();
        $query = 'select * from ' . static::TABLE;
        return $db->query($query,
            [],
            static::class);
    }

    /**
     * @param $id
     * @return mixed
     * @throws Exceptions\DbException
     */
    public static function findById($id)
    {
        $db = new Db();
        $query = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $res = $db->query($query,
            [':id' =>$id],
            static::class);
        return $res ? $res[0] : null;
    }

    public function insert()
    {
        $fields = get_object_vars($this);

        $cols = [];
        $data = [];

        foreach ($fields as $name => $value) {
            if ('id' == $name) {
                continue;
            }
            $cols[] = $name;
            $data[':' . $name] = $value;
        }

       $sql = 'INSERT INTO ' . static::TABLE . '
        ('. implode(',', $cols).') 
        VALUES 
        ('.implode(',',array_keys($data)).') ';

        $db = new Db();
        $db->execute($sql, $data);
        $this->id = $db->getLastId();
           }

}
