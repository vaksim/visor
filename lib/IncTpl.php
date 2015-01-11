<?php
class IncTpl
{
    static private $_tplPagePath = './templates/';
    static private $_tplLibPath = './lib/';
    static private $_tplExtension = '.html';
    static private $_tplFile = null;
    static public $divClassPage = null;
    
    static public function show($tpl, $className = null, $divClassPage = null)
    {
        if (!isset($className)) {
            self::$_tplFile = self::$_tplPagePath . $tpl . self::$_tplExtension;
        } else {
            self::$_tplFile = self::$_tplLibPath . $className . '/' . $tpl . self::$_tplExtension;
        }
        if (file_exists(self::$_tplFile)) {
            if (isset($divClassPage)) {
                echo '<div class="' . $divClassPage . '">';
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
