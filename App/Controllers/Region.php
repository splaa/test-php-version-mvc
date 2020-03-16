<?php


namespace App\Controllers;


use App\Controller;
use App\Db;

class Region extends Controller
{

    public function handle()
    {
        $action = isset($_GET['action']) ? $_GET['action'] : null;

        if (!is_null($action)) {
            switch ($action) {
                case 'getRegion':
                    $this->getRegion();
                    break;
                case 'getCity':
                    $region_id = isset($_GET['ter_id']) ? $_GET['ter_id'] : '';
                    echo $this->getCity($region_id);
                    break;
                case 'getArea':
                    $city_id = isset($_GET['ter_id']) ? $_GET['ter_id'] : '';
                    echo $this->getArea($city_id);
                    break;

            }

        }


    }

    function getRegion()
    {
        global $dbh;
        $regions = [];

        $data = queryDB($dbh);
        foreach ($data as $region) {
            $regions[] = [
                'ter_pid' => $region['ter_id'],
                'ter_name' => $region['ter_name'],
            ];
        }

        return $regions;

    }

    function getCity($region_id)
    {
        $dbh = new Db();
        $json = [];


        $data = $this->queryDBCity($dbh->dbh, $region_id);


        foreach ($data as $region) {
            $json[] = [
                'ter_pid' => $region['ter_id'],
                'ter_name' => $region['ter_name']
            ];
        }
        return json_encode($json);
    }

    public function queryDBCity($dbh, $region_id)
    {
        $sth = $dbh->prepare('select t.ter_name, t.ter_id, t.ter_pid  
from test.t_koatuu_tree t 
where ter_id= ' . $region_id . ' or ter_pid=' . $region_id . ' ;');

        $sth->execute();
        return $sth->fetchAll();
    }

    function getArea($region_id)
    {
        $dbh = new Db();
        $json = [];


        $data = $this->queryDBCity($dbh->dbh, $region_id);


        foreach ($data as $region) {
            $json[] = [
                'ter_pid' => $region['ter_id'],
                'ter_name' => $region['ter_name']
            ];
        }

        echo json_encode($json);
    }

    function queryDB($dbh)
    {

        $sth = $dbh->prepare('select t.ter_name, t.ter_id, t.ter_pid  from test.t_koatuu_tree t where t.ter_type_id=0 ;');


        $sth->execute();


        return $sth->fetchAll();
    }

    function queryDBArea($dbh, $region_id)

    {
        $sth = $dbh->prepare('select t.ter_name, t.ter_id, t.ter_pid  
from test.t_koatuu_tree t 
where t.ter_type_id=2 
  and ter_id= ' . $region_id . ' or ter_pid=' . $region_id . ' ;');

        $sth->execute();
        return $sth->fetchAll();
    }
}
