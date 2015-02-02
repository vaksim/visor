<?php
class PageRepairs extends PageTable
{
//    static public $id = 1;
/*PageData = array(
        'id' => 1,
        'title' => 'Ремонты',
        'name' => 'PageRepairs'
    );

*/
    static public function prepHeads()
    {
        self::$heads['row_number'] = '№ п/п';
        self::$heads['subdivision_name'] = 'Подразделение';
        self::$heads['locomotive_name'] = 'Наименование';
        self::$heads['locomotive_number'] = 'Номер';
        self::$heads['date_beginning'] = 'Дата начала ремонта';
        self::$heads['date_ending'] = 'Дата окончания ремонта';
    }

//    static public $heads = array();
    static public $addPage = 'PageRepairAdd';
//    static public $data;
//    static public $vars;
    static public $pageTitle = 'Ремонты';
//    static public $sql = null; 

/*    static public function prepData()
    {
        DB::setQuery('SELECT ' .
        'repairs.id AS repair_ipad, ' .
        'row_number() OVER (), ' .
        'subdivisions.name AS subdivision_name, ' .
        'locomotive_names.name AS locomotive_name, ' .
        'locomotives.number AS locomotive_number, ' .
        'to_char(date_beginning, \'dd.mm.yyyy\') AS date_beginning, ' .
        'to_char(date_ending, \'dd.mm.yyyy\') AS date_ending ' .
        'FROM repairs, subdivisions, locomotives, locomotive_names ' .
        'WHERE repairs.locomotives_id = locomotive_names.id;
');
        @DB::setResult(pg_query(DB::getQuery()));
        self::$data = pg_fetch_all(DB::getResult());
//        self::$vars = self::$data;
    }
*/
    static public function prep()
    {
        self::$sql = 'SELECT 
                        repairs.id AS repair_id, 
                        row_number() OVER (), 
                        subdivisions.name AS subdivision_name,
                        locomotive_names.name AS locomotive_name, 
                        locomotives.number AS locomotive_number,  
                        to_char(date_beginning, \'dd.mm.yyyy\') AS date_beginning, 
                        to_char(date_ending, \'dd.mm.yyyy\') AS date_ending 
                      FROM 
          (((repairs 
          INNER JOIN subdivisions ON (repairs.subdivisions_id = subdivisions.id))
          INNER JOIN locomotives ON (repairs.locomotives_id = locomotives.id))
          INNER JOIN locomotive_names ON (locomotives.id = locomotive_names.id))
                      ;';

        Table::prep(get_class());
    }
/*
    static public function show()
    {
        Table::show();
//        IncTpl::show('repairs');
    }
*/
}
?>