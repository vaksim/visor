<?php
class HtmlMain
{
    static public function show()
    {
        echo "<h1>Главная страница.</h1>\n";
        echo "Машины в ремонте";
        DB::setQuery('SELECT * FROM users WHERE name = \'' . $_SESSION['loginUserName'] . '\';');
        @DB::setResult(pg_query(DB::getQuery()));
//        echo '<br>' . DB::getQuery() . '<br>';
        
        echo "<table>\n";
        while ($line = pg_fetch_array(DB::getResult(), null, PGSQL_ASSOC)) {
            echo "\t<tr>\n";
            foreach ($line as $col_value) {
  
                echo "\t\t<td>- $col_value - </td>\n";
            }
            echo "\t</tr>\n";
        }
        echo "</table>\n";

        IncTpl::show('main');
    }
}
?>
