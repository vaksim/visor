<?php
/*
Принимает из POST данные:
            self::$nameValue = $_POST['name_value'] имя переменной которую должна вернуть страница
            self::$prevPageButton = ($_POST['button']) имя кнопки котороая была нажа в предыдущей форме, при листании года чтобы предыдущая форма думала что дату запросили повторно
            self::$prevPage = $_POST['page'] страница предыдущей формы, чтобы текущая форма знала откуда она запущена
            self::$selectedYear = $_POST['selected_year'] необходима для листания годов

Любые кнпокпи возвращаются в POST:
name="page" value="<?=PageCalendar::$prevPage?>">
name="name_value" value="<?=PageCalendar::$nameValue?>">

Кнопки переключания года возвращают в POST:
name="div_class" value="ChildPage">
name="selected_year" value="<?=$otherYear?>">
name="button" value="<?=PageCalendar::$prevPageButton?>">
name="<?=PageCalendar::$prevPageButton?>" value="">

Кнопка даты возвращает в POST:
name="button_date_get" value="<?=$date?>">
name="<?=PageCalendar::$nameValue?>" value="<?=(date("d.m.Y", mktime(0, 0, 0

*/
class Calendar
{
    static public $divClassPage = null;
    static public $prevPage = null;
    static public $prevPageButton = null;
    static public $nameValue = null; //Имя переменной возвращаемое формой
    static public $selectedYear = null;
    static public $months = array(1 => 'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Нобябь', 'Декабрь');
    static public $days = array('Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Вс');
    
    
    static public function prep($divClassPage = null)
    {
        self::$divClassPage = $divClassPage;
        if (isset($_POST['name_value'])) {
            self::$nameValue = $_POST['name_value'];
        }

        if (isset($_POST['button'])) {
            self::$prevPageButton = ($_POST['button']);
        }
        if (isset($_POST['page'])) {
            self::$prevPage = $_POST['page'];
        }
        if (isset($_POST['selected_year'])) {
            self::$selectedYear = $_POST['selected_year'];
        } else {
            self::$selectedYear = 2015;
        }
    }
    static public function show($divClassPage = null)
    {
        IncTpl::show('calendar', get_class(), self::$divClassPage);
//        PageDebug::$varTmp2 = self::$prevPageButton;
    }

    static public function tplVars()
    {
        IncTpl::show('calendar_vars', get_class());
    }
}

?>