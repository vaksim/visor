<?php
//Файл содержит функции для отображения панели регистрации.
class Auth
{
    static private $authValid = false;


    static public function getAuthValid()
    {
        return self::$authValid;
    }
    static public function authValid()
    {
        DB::connect( "localhost", "visor", "chrbu01", "123");

        if (isset($_SESSION['loginUserName'])) {
            return true;
        } elseif (isset($_POST['loginUserName'])) {
            //Проверка пользователя по базе
            if (self::_verifUserPost($_POST['loginUserName'], $_POST['loginUserPass'])) {
                $_SESSION['loginUserName'] = $_POST['loginUserName'];
                return true;
            }
        }
        return false;        
    }

    static private function _verifUserPost($loginUserName, $loginUserPass)
    {
        
        //$db = pg_connect("host=localhost dbname=visor user=chrbu01 password=123")
        //  or die('Cold not connect: ' . pg_last_error());

        DB::setQuery('SELECT * FROM users WHERE name = \'' . $loginUserName . '\' AND password=\'' . $loginUserPass . '\';');
        @DB::setResult(pg_query(DB::getQuery()));
        if (@pg_num_rows(DB::getResult()) != 0) {
            return true;
        }
        return false;
    }
}
?>