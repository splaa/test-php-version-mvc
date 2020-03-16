<?php


namespace App\Models;


use App\Db;
use App\Model;

class User extends Model
{
    public const TABLE = 'user';


    public $name;
    public $email;
    public $territory;
    public $territory_json;


    /**
     * @return mixed
     */
    public function getTerritoryJson()
    {
        return $this->territory_json;
    }

    public function getTerritory()
    {
        $db = new Db();
        $dbh = $db->dbh;
        $sth = $dbh->prepare('select u.id, u.name, u.email, (SELECT tkt.ter_name FROM t_koatuu_tree tkt WHERE ter_id = JSON_EXTRACT(u.territory_json, "$.region_id")) as region, (SELECT tkt.ter_name FROM t_koatuu_tree tkt WHERE ter_id = JSON_EXTRACT(u.territory_json, "$.city_id")) as city, (SELECT tkt.ter_name FROM t_koatuu_tree tkt WHERE ter_id = JSON_EXTRACT(u.territory_json, "$.area")) as area  from test.user u');
        $sth->execute();

        return $sth->fetch(\PDO::FETCH_ASSOC);
    }


}
