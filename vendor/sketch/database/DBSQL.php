<?php
namespace sketch\database;

class DBSQL
{

    protected $db;
    protected $dsn;
    protected $user;
    protected $password;

    public function setAttributes($attr){


        foreach ($attr as $key => $val){
            $this[$key] = $val;
        }

    }

    public function Connect($attr = null)
    {

        if ($attr !== null){
            $this->setAttributes($attr);
        }


        $this->db = new PDO(
            $this->dsn,
            $this->user,
            $this->password,
            [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // возвращать ассоциативные массивы
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // возвращать Exception в случае ошибки
            ]
        );
    }

    public function Query($query, $params = array())
    {
        $res = $this->db->prepare($query);
        $res->execute($params);
        return $res;
    }

    public function Select($query, $params = array())
    {
        $result = $this->Query($query, $params);
        if ($result) {
            return $result->fetchAll();
        }
    }

    public static function ShieldParameter($param){

        //__Add_functional__//

        return $param;
    }

}