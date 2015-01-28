<?php
class PageTable
{
    static public $heads = array();
    static public $data = array();
    static public $addPage = null;
//    static public $pageTitle = null;
    static public $sql = null; 

    static public function prepHeads()
    {
    }
    static public function prepData($sql)
    {
        DB::setQuery($sql);

        @DB::setResult(pg_query(DB::getQuery()));
        self::$data = pg_fetch_all(DB::getResult());
        //   self::$divClassPage = $_POST['div_class'];
    }

    static public function show()
    {
        Table::show();
    }
}
?>