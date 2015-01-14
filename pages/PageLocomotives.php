<?php
class PageLocomotives extends PageTable
{
    static public $addPage = 'PageLocomotiveAdd';
    static public $pageTitle = 'Машины';
//    static public $divClassPage = 'ChildPage';
    static public $sql = 'SELECT row_number() OVER () AS row_number, locomotives.id AS locomotive_id, locomotive_names.id AS locomotive_name_id, locomotive_names.name AS locomotive_name, locomotives.number AS locomotive_number FROM locomotives, locomotive_names WHERE locomotives.id = locomotive_names.id;';

    static public function prepHeads()
    {
        self::$heads['row_number'] = '№ п/п';
        self::$heads['locomotive_name'] = 'Наименование';
        self::$heads['locomotive_number'] = 'Номер';
}

/*'SELECT '.
        'row_number() OVER () AS row_number, ';.
        'locomotives.id AS locomotive_id, '.
        'locomotive_names.id AS locomotive_name_id, '.
        'locomotive_names.name AS locomotive_name, '.
        'locomotives.number AS locomotive_number '.
        'FROM locomotives, locomotive_names '.
        'WHERE locomotives.id = locomotive_names.id;';
*/
/*    static public function prepData()
    {
        DB::setQuery(self::$_sql);

        @DB::setResult(pg_query(DB::getQuery()));
        self::$data = pg_fetch_all(DB::getResult());
        self::$divClassPage = $_POST['div_class'];
    }
*/
    static public function prep($divClassPage = null)
    {
        Table::prep(get_class(), $divClassPage);
    }
/*    static public function show() //$divClassPage = null)
    {
///        PageDebug::$varTmp = self::$divClassPage;
        Table::show(); //get_class(), $divClassPage);
//        IncTpl::show('Locomotives', null, $divClassPage);
    }
*/
}
?>