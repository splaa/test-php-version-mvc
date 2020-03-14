<?php


namespace App\Models;


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


}
