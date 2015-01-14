<?php
class Table
{
    static public $className = null;//Имя вызываемого класса
    static public $heads = array(); //Заголовки таблицы
    static public $data = array();  //Содержимое таблицы
    static public $page = null;     //Страница 
    static public $addPage = null;  //Страница для возврата заполняющей формы
    static public $divClassPage = null; //В каком контейнере будет отображаться форма
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
//        echo '--';
//        echo self::$divClassPage;

        IncTpl::show('table', get_class(), self::$divClassPage);
    }
}
?>