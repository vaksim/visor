<?php
class IncTpl
{
    static private $_tplPath = './templates/';
    static private $_tplExtension = '.html';
    static private $_tplFile = null;
    
    static public function show($tpl)
    {
        self::$_tplFile = self::$_tplPath . $tpl . self::$_tplExtension;
        if (file_exists(self::$_tplFile)) {
            include(self::$_tplFile);
        } else {
            echo '<br>File not found (' . self::$_tplFile . ')<br>' . "\n";
        }
    }
}
?>
