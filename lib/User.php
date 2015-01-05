<?php
class User
{
    static public $name;
    static public $id;

    static public function prep($userName)
    {
//        self::$name = $userName;
        DB::setQuery('SELECT * FROM users WHERE name = \'' . $userName . '\';');
        @DB::setResult(pg_query(DB::getQuery()));
        while ($row =  @pg_fetch_assoc(DB::getResult())) {
            self::$id = $row['id'];
            self::$name = $row['name'];
        }
    }
}
?>
