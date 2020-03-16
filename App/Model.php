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
            [':id' => $id],
            static::class);
        return $res ? $res[0] : null;
    }

    public function isMailExists($mail): bool
    {
        $dbh = new Db();
        $query = 'select count(u.email)  from test.user u where email=:email';
        $res = $dbh->query($query,
            [':email' => $mail],
            static::class, \PDO::FETCH_COLUMN)[0];

        return $res > 0 ? true : false;
    }

    public function getUserByEmail($email)
    {
        $db = new Db();
        $dbh = $db->dbh;
        $sth = $dbh->prepare('select u.id, u.name, u.email, (SELECT tkt.ter_name FROM t_koatuu_tree tkt WHERE ter_id = JSON_EXTRACT(u.territory_json, "$.region_id")) as region, (SELECT tkt.ter_name FROM t_koatuu_tree tkt WHERE ter_id = JSON_EXTRACT(u.territory_json, "$.city_id")) as city, (SELECT tkt.ter_name FROM t_koatuu_tree tkt WHERE ter_id = JSON_EXTRACT(u.territory_json, "$.area")) as area  from test.user u where u.email= ? ;');
        $sth->execute([$email]);

        return $sth->fetch(\PDO::FETCH_ASSOC);
    }

    public function insertDbUser($post)
    {
        if (!$this->isMailExists($post['email'])) {

            $db = new Db();;
            $dbh = $db->dbh;
            $fio = isset($post['fio']) && !is_null($post['fio']) ? $post['fio'] : '';
            $email = isset($post['email']) && !is_null($post['email']) ? $post['email'] : '';

            $region_id = isset($post['region_id']) && !is_null($post['region_id']) ? $post['region_id'] : '';
            $city_id = isset($post['city']) && !is_null($post['city']) ? $post['city'] : '';
            $area = isset($post['area']) && !is_null($post['area']) ? $post['area'] : '';

            $territory = json_encode(
                [
                    'region_id' => $region_id,
                    'city_id' => $city_id,
                    'area' => $area
                ]);

            $sql = "INSERT INTO user SET name=:name, email=:email, territory=:territory, territory_json=:territory_json;";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':name', $fio);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':territory', $territory);
            $stmt->bindParam(':territory_json', $territory, \PDO::PARAM_STR);
            $stmt->execute();
        } else {

            return $this->getUserByEmail($post['email']);

        }
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
        (' . implode(',', $cols) . ') 
        VALUES 
        (' . implode(',', array_keys($data)) . ') ';

        $db = new Db();
        $db->execute($sql, $data);
        $this->id = $db->getLastId();
    }



}
