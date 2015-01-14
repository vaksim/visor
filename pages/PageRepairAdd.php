<?php
class PageRepairAdd extends PageAddForm
{
    static public function prepVars()
    {
        self::$vars['subdivision_id'] = 1;
        self::$vars['subdivision_name'] ='Черепаново';
        self::$vars['locomotive_id'] = null;
        self::$vars['locomotive_name'] = null;
        self::$vars['locomotive_number'] = null;
        self::$vars['date_beginning'] = null;
        self::$vars['date_ending'] = null;
    }

    static public function prepTpl()
    {
        self::$tpl[1]['title'][1] = 'Подразделение:';
        self::$tpl[1]['label'][1] = self::$vars['subdivision_name'];
        self::$tpl[2]['title'][1] = 'Машина:';
        self::$tpl[2]['label'][1] = self::$vars['locomotive_name'];
        self::$tpl[2]['buttons'][1]['set']['name'] = 'button_locomotive';
        self::$tpl[2]['buttons'][1]['set']['type'] = 'page';
        self::$tpl[2]['buttons'][1]['set']['page'] = 'PageLocomotives';
        self::$tpl[2]['buttons'][1]['vars'][1] = 'locomotive_id';
        self::$tpl[2]['buttons'][1]['vars'][2] = 'locomotive_name';
        self::$tpl[2]['buttons'][1]['vars'][3] = 'locomotive_number';

        self::$tpl[3]['title'][1] = 'Номер машины:';
        self::$tpl[3]['label'][1] = self::$vars['locomotive_number'];

        self::$tpl[4]['title'][1] = 'Дата начала ремонта:';
        self::$tpl[4]['label'][1] = self::$vars['date_beginning'];
        self::$tpl[4]['buttons'][1]['set']['name'] = 'button_date_beginning';
        self::$tpl[4]['buttons'][1]['set']['type'] = 'page';
        self::$tpl[4]['buttons'][1]['set']['page'] = 'Calendar';
        self::$tpl[4]['buttons'][1]['vars']['name_value'] = 'date_beginning';
//        self::$tpl[4]['buttons'][1]['get_vars'][1]['var'] = 'date_beginning';

        self::$tpl[5]['title'][1] = 'Дата окончания ремонта:';
        self::$tpl[5]['label'][1] = self::$vars['date_ending'];
        self::$tpl[5]['buttons'][1]['set']['name'] = 'button_date_ending';
        self::$tpl[5]['buttons'][1]['set']['type'] = 'page';
        self::$tpl[5]['buttons'][1]['set']['page'] = 'Calendar';
        self::$tpl[5]['buttons'][1]['vars']['name_value'] = 'date_ending';
//        self::$tpl[5]['buttons'][1]['values'][1]['var'] = 'date_ending';


//        self::$tpl[4]['buttons'][1]['hidden'][1]['button'] = self::$tpl[4]['buttons'][1]['name'];

//        self::$tpl['4']['button'] = 'button_date_beginning';

/*        self::$tpl[4]['hidden'][1]['name_value'] = 'date_beginning';
        self::$tpl[4]['hidden'][1]['button'] = self::$tpl[4]['buttons'][1]['name'];
/*
        self::$tpl['5']['title'] = 'Дата оконания ремонта:';
        self::$tpl['5']['label'] = self::$vars['date_ending'];

        self::$tpl['5']['button']['name'] = 'button_date_ending';
        self::$tpl['5']['button']['page'] = 'Calendar';

//        self::$tpl['5']['button'] = 'button_date_ending';
        self::$tpl['5']['hidden']['name_value'] = 'date_ending';
        self::$tpl['5']['hidden']['button'] = self::$tpl['5']['button'];
*/
    }
    static public function prepButtons()
    {
        //Кнопки
        self::$buttons['button_subdivision'] ='PageSubdivision';
        self::$buttons['button_locomotive'] ='PageLocomotives';
        self::$buttons['button_date_beginning'] ='Calendar';
        self::$buttons['button_date_ending'] ='Calendar';
    }
/*
    static public $vars = array();
    static public $buttons = array();
    static public $tpl = array();
*/
    static public function prep()
    {
        AddForm::prep(get_class());
    }
/*
    static public function show()
    {
        AddForm::show();
    }
*/
/*--------------------------------------------------------------------------------
        if (isset($_POST['button_repair_new'])) { //В предыдущем сеансе была
                                                  //нажата кнопка Добавить
                                                  //Значить инициализируем переменные
//            DB::query(' DELETE FROM repair_add WHERE user_id = \'' . User::$id . '\';');
            foreach(self::$vars as $key => $value) {
                $_SESSION[$key] = $value;
            }
        }
/*--------------------------------------------------------------------------------*/
/*            
        }
        $sql = 'SELECT ';
        foreach(self::$vars as $key => $value) {  //
            $sql = $sql . ' ' . $key . ',';
        }
        $sql = rtrim($sql, ',');
        $sql = $sql . ' FROM repair_add WHERE user_id = ' . User::$id . ';';

        PageDebug::$varTmp = $sql;
        PageDebug::$varTmp2 = $change;

        DB::query($sql);      
        if (@pg_num_rows(DB::getResult()) !== 0) { //Если строчка найдена то заносим 
                                                   //данные в массив для шаблона
            while ($row =  @pg_fetch_assoc(DB::getResult())) {
                foreach(self::$vars as $key => $value) {               
                self::$vars[$key] = $row[$key];
                }
            }
            
        } else { //Если записи для текущего пользователя нету, мы ее вставляем

        DB::setQuery('INSERT INTO repair_add (user_id) VALUES (' . User::$id . ');');
        @DB::setResult(pg_query(DB::getQuery()));
        }
        
        if (isset($_POST['button_subdivision'])) {
            self::_buttonSubdivision();
        }
*/

/*----------------------------------------------------------------------------
        foreach(self::$arrButtons as $key => $arr) {
            if (isset($_POST[$key])) { //В предыдущем сеансе была нажата к
                //нопка выбора машины
//            self::$clickButtonLocomotive = true;  //Шаблон locomotives будет рисовать
                //кнопки для RepairAdd
                self::$arrButtons[$key]['click'] = true;
                $arr['page']::prep();
            }
        }

/*-----------------------------------------------------------------------------*/
        /*
//Проверяем есть-ли данные из дочерних форм
//попутно сформируем строку для запроса для формаирования формы
        $change = false;
        $sql = 'UPDATE repair_add SET';
        foreach(self::$vars as $key => $value) {
            if (isset($_POST[$key]) && ($_POST[$key])) {
                self::$vars[$key] = $_POST[$key];
                $change = true;
            }
            if (isset(self::$vars[$key])) {
                $sql = $sql . ' ' . $key . ' = \'' . self::$vars[$key] . '\',';
            }
        }
        $sql = rtrim($sql, ',');
        $sql = $sql . ' WHERE user_id = ' . User::$id . ';';
        //Заносим данные во временную таблица repair_add
        PageDebug::$arrDebug = self::$vars;
        if ($change) {
            DB::query($sql);
        }
*/
/*---------------------------------------------------------------------
        foreach(self::$vars as $key => $value) {
            if (isset($_POST[$key])) {
                self::$vars[$key] = $_POST[$key];
                $_SESSION[$key] = self::$vars[$key];
            } else {
                self::$vars[$key] = $_SESSION[$key];
            }
        }
        
        //Формируем запрос для добавления ремонта
        if (isset($_POST['button_save'])) { 
            foreach(self::$vars as $key => $value) {
                if (isset($_POST[$key])) {
                    self::$vars[$key] = $_POST[$key];
                    $_SESSION[$key] = self::$vars[$key];
                } else {
                    self::$vars[$key] = $_SESSION[$key];
                }
            }
        }
-----------------------------------------------------------------------------*/
//        PageDebug::$arrDebug = self::$arrButtons;
//        PageDebug::$varTmp = self::$arrButtons['button_locomotive']['click'];
//        PageDebug::$varTmp2 = self::$arrButtons;
        
//    }
    
/*
        IncTpl::show('repair_add');
        $divClassPage = null;
        if (isset($_POST['div_class'])) {
            $divClassPage = $_POST['div_class'];
        }
        foreach(self::$arrButtons as $key => $arr) { //Если в предыдущем сеансе
            if ($arr['click']) {                     //была нажата какая-то кнопка 
                $arr['page']::show($divClassPage);   //показываем страницу
            }
            }

    }
*/
/*    static public function buttonClick($button)
    {
/*        if (!isset($_POST['$button'])) {
            
          return 1;
          }
        switch ($button) {
        case 'button_subdivision':
            self::_buttonSubdivision();
            break;
        case 1:
            echo "i равно 1";
            break;
        case 2:
            echo "i равно 2";
            break;
        default: return 1;
        }
    }
*/
/*
    static private function _buttonSubdivision()
    {
        IncTpl::show('button_subdivision');
    }
*/
/*
    static private function _buttonLocomotive()
    {
        //   IncTpl::show('button_locomotive');
        
        PageLocomotives::prep();

    }

    static public function repairAddFormHead()
    {
        IncTpl::show('repair_add_form');
    }
/*
    static public function prepVars()
    {
    
    }
*/
}
?>