<?php
class Table
{
    static public $className = null;
    static public $heads = array();
    static public $data = array();
    static public $page = null;
    static public $addPage = null;
    static public $divClassPage = null;
//    static public $vars = array();


    static public function prep($className, $divClassPage = null)

    {
        self::$className = $className;
        self::$divClassPage = $divClassPage;
        if (isset($_POST['page'])) {
            self::$page = $_POST['page'];
        }

        $className::prepData($className::$sql);
        self::$addPage = $className::$addPage;
        $className::prepHeads();
        self::$heads = $className::$heads;
        self::$data = $className::$data;
        //      self::$vars = $className::$vars;
//        PageDebug::$varTmp = self::$page;
        //      PageDebug::$varTmp2 = self::$addPage;


    }
    static public function show()
    {
//        PageDebug::$varTmp2 = self::$divClassPage;
        IncTpl::show('table', get_class(), self::$divClassPage);
    }
}
?>