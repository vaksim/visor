<?php
class PageRepairs
{
    static public $arrRepairs;
    static public $pageTitle = 'Ремонты';

    static public function prep()
    {
        DB::setQuery('SELECT repairs.id AS repair_id, row_number() OVER (), subdivisions.name AS subdivision_name, locomotive_names.name AS locomotive_name, locomotives.number AS locomotive_number, date_beginning, date_ending FROM repairs, subdivisions, locomotives, locomotive_names;
');
        @DB::setResult(pg_query(DB::getQuery()));
        self::$arrRepairs = pg_fetch_all(DB::getResult());

    }
    static public function show()
    {
        IncTpl::show('repairs');
    }
}
?>