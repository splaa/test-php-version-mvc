<?php


namespace App\Models;


use App\Db;

class Region
{
    public function getRegion()
    {
        $dbh = new Db();
        $regions = [];

        $data = $this->queryDB($dbh->dbh);
        foreach ($data as $region) {
            $regions[] = [
                'ter_pid' => $region['ter_id'],
                'ter_name' => $region['ter_name'],
            ];
        }

        return $regions;

    }

    public function queryDB($dbh)
    {

        $sth = $dbh->prepare('select t.ter_name, t.ter_id, t.ter_pid  from test.t_koatuu_tree t where t.ter_type_id=0 ;');


        $sth->execute();


        return $sth->fetchAll();
    }

}
