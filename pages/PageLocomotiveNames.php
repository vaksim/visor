<?php
class PageLocomotiveNames extends PageTable
{
    static public $addPage = 'PageLocomotiveNameAdd';   //Страница формы добавления
    static public $pageTitle = 'Добавление наименования машины';
    static public $divClassPage = 'ChildPage';
    static public $sql = 'SELECT row_number() OVER() AS row_number, locomotive_names.id AS locomotive_name_id, locomotive_names.name AS locomotive_name FROM locomotive_names;';
//SELECT row_number() OVER() AS row_number, id AS id, name AS name FROM locomotive_names;';
    static public function prepHeads()
    {
        self::$heads['row_number'] = '№ п/п';
        self::$heads['locomotive_name'] = 'Наименование';
}

    static public function prep($divClassPage = null)
    {
        Table::prep(get_class(), $divClassPage);
    }

}
?>