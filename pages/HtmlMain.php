<?php
class HtmlMain
{
    static public $arrRepairs;

    static public function show()
    {
//        echo "<h1>Главная страница.</h1>\n";
//      echo "Машины в ремонте";
//        DB::setQuery('SELECT * FROM locomotive;');
        DB::setQuery(' SELECT repair.id AS repair_id, row_number() OVER (), subdivision.name AS subdivision_name, locomotive_name.name AS locomotive_name, locomotive.number AS locomotive_number, date_beginning, date_ending FROM repair, subdivision, locomotive, locomotive_name WHERE locomotive.locomotive_name_id = locomotive_name.id;
');
        @DB::setResult(pg_query(DB::getQuery()));
        self::$arrRepairs = pg_fetch_all(DB::getResult());
//        echo '<br>' . DB::getQuery() . '<br>';
        
/*        echo "<table>\n";
          while ($line = pg_fetch_array(DB::getResult(), null, PGSQL_ASSOC)) {
          echo "\t<tr>\n";
          foreach ($line as $col_value) {
  
          echo "\t\t<td>- $col_value - </td>\n";
          }
          echo "\t</tr>\n";
          }
          echo "</table>\n";
*/
        IncTpl::show('main');
    }
}
?>
