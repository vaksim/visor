<?php
class DB
{
    static private $_connetionType = 'pgsql';
    static private $_host = 'localhost';
    static private $_dbName = 'test';
    static private $_user;
    static private $_password = null;
    static private $_db = null;
    static private $_query = null;
    static public $_result = null;
        
    static public function connect($host = 'localhost', $dbName = 'test', $user = 'test', $password = null)
    {
        self::$_host = $host;
        self::$_dbName = $dbName;
        self::$_user = $user;
        self::$_password = $password;
        $dbParam = 'host=' . self::$_host . ' dbname=' . self::$_dbName . ' user=' . self::$_user . ' password=' . self::$_password;
//        echo $dbParam;
        //self::$db =
        pg_connect($dbParam)
            or die('Cold not connect: ' . pg_last_error());
//        echo 'UUUUUUUUUUUUUUUUUU';
        //return $db;
    }

    static public function setQuery($query)
    {
        self::$_query = $query;
    }

    static public function getQuery()
    {
        return self::$_query;
    }

    static public function connection()
    {

    }
    
    static public function setConnectonType($connetionType = 'pgsql')
    {
        self::$connetionType = $connetionType;
    }

    static public function setResult($result)
    {
        if (!$result) {
            echo "<br>Ошибка в запросе<br>\n";
            self::$_result = $result;
        } else {
//            echo 'llllllllllll' . $result . 'ssssssssssssssss';
            self::$_result = $result;
        }
    }

    static public function getResult()
    {
        if (!self::$_result) {
            echo "<br>Запрос не сформирован<br>\n";
        } else {
//            echo 'llllllllllll' . $result . 'ssssssssssssssss';
            return self::$_result;
        }
        

    }
}
?>
