<?php
//Файл содержит функции для отображения панели регистрации.
class Auth
{
    static public $valid = false;

    static public function getAuthValid()
    {
        return self::$authValid;
    }
    static public function authValid()
    {
//        DB::connect( "localhost", "visor", "chrbu01", "123");

        if (isset($_SESSION['login_user_name'])) {
            self::$valid = true;
            return true;
        } elseif (isset($_POST['login_user_name'])) {
            //Проверка пользователя по базе
            if (self::_verifUserPost($_POST['login_user_name'], $_POST['login_user_pass'])) {
                $_SESSION['login_user_name'] = $_POST['login_user_name'];
                User::$name = $_POST['login_user_name'];
                self::$valid = true;
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