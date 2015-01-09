<?php
class IncTpl
{
    static private $_tplPath = './templates/';
    static private $_tplExtension = '.html';
    static private $_tplFile = null;
    static public $divClassPage = null;
    
    static public function show($tpl, $divClassPage = null)
    {
        self::$_tplFile = self::$_tplPath . $tpl . self::$_tplExtension;
        if (file_exists(self::$_tplFile)) {
            if (isset($divClassPage)) {
                echo '<div class="' . $divClassPage . '">';
//                self::$divClassPage = $divClassPage;
                include(self::$_tplFile);
                echo '</div>';
            } else {
                include(self::$_tplFile);
            }
        } else {
            echo '<br>File not found (' . self::$_tplFile . ')<br>' . "\n";
        }
    }
}
?>
