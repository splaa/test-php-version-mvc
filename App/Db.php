<?php


namespace App;




use App\Exceptions\DbException;

class Db
{
    public $dbh;

    public function __construct()
    {

        try {
            $config = (include __DIR__ . '/../config/config.php')['db'];
            $this->dbh = new \PDO(
                'mysql:host=' . $config['host'] .
                ';dbname=' . $config['dbname'] .
                ';charset=utf8',
                $config['user'],
                $config['password']);
        } catch (\PDOException $e) {
            throw new DbException('', 'Ошибка подключения ДБ');
        }
    }


    public function query($sql, $data = [], $class, $fetch_style = \PDO::FETCH_CLASS)
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        if (false) {
            throw new DbException($sql, 'Запрос неможет быть выполнен', 100);
        }


        return $sth->fetchAll($fetch_style, $class);
    }
    public function execute($query, $params = [])
    {
        $sth = $this->dbh->prepare($query);

       return $sth->execute($params);
    }

    public function getLastId()
    {
        return $this->dbh->lastInsertId();
    }

}
