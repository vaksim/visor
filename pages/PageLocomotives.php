<?php
class PageLocomotives
{
    static public $arrLocomotives;
    static public $pageTitle = 'Машины';
    static public $divClassPage = 'ChildPage';

    static public function prep()
    {
        DB::setQuery('SELECT row_number() OVER () AS No, locomotives.id AS locomotive_id, locomotive_names.id AS locomotive_name_id, locomotive_names.name AS locomotive_name, locomotives.number AS locomotive_number FROM locomotives, locomotive_names WHERE locomotives.id = locomotive_names.id;');
        @DB::setResult(pg_query(DB::getQuery()));
        self::$arrLocomotives = pg_fetch_all(DB::getResult());
        self::$divClassPage = $_POST['div_class'];
    }
    static public function show()
    {
        IncTpl::show('Locomotives');
    }

    static public function add()
    {

    }
}
?>