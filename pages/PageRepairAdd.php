<?php
class PageRepairAdd
{
    static public $clickButtonLocomotive = false;
    static public $arrRepair = array(
        'subdivision_id' => 1,
        'subdivision_name' => 'Черепаново',
        'locomotive_id' => null,
        'locomotive_name' => null,
        'locomotive_number' => null,
        'date_beginning' => null,
        'date_ending' => null
    );
    static public $arrButtons = array(
        'button_subdivision' => array(
            'click' => false,
            'page' => 'PageSubdivision'
        ),
        'button_locomotive' => array(
            'click' => false,
            'page' => 'PageLocomotives'
        ),
        'button_date_beginning' => array(
            'click' => false,
            'page' => 'PageCalendar'
        ),
        'button_date_ending' => array(
            'click' => false,
            'page' => 'PageCalendar'
        )
    );

    static public $arrTitles = array();
    static public $arrTpl = array();
    static public $arrRepairTmp = array(
        'subdivision' => array(
            'name' => 'Подразделение',
            'data' => '-'
        ),
        'locomotive_name' => array(
            'name' => 'Машина:',
            'data' => '-'
        ),
        'locomotive_number' => array(
            'name' => 'Номер',
            'data' => '-'
        ),
        'date_begining' => array(
            'name' => 'Дата начала ремонта',
            'data' => '-'
        ),
        'date_ending' => array(
            'name' => 'Дата окончания ремонта',
            'data' => '-'
        )
    );

    static public function prep()
    {
        if (isset($_POST['button_repair_new'])) { //В предыдущем сеансе была
                                                  //нажата кнопка Добавить
                                                  //Значить инициализируем переменные
//            DB::query(' DELETE FROM repair_add WHERE user_id = \'' . User::$id . '\';');
            foreach(self::$arrRepair as $key => $value) {
                $_SESSION[$key] = $value;
            }
        }

/*            
        }
        $sql = 'SELECT ';
        foreach(self::$arrRepair as $key => $value) {  //
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
                foreach(self::$arrRepair as $key => $value) {               
                self::$arrRepair[$key] = $row[$key];
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
        foreach(self::$arrButtons as $key => $arr) {
            if (isset($_POST[$key])) { //В предыдущем сеансе была нажата к
                //нопка выбора машины
//            self::$clickButtonLocomotive = true;  //Шаблон locomotives будет рисовать
                //кнопки для RepairAdd
                self::$arrButtons[$key]['click'] = true;
                $arr['page']::prep();
            }
        }
        /*
//Проверяем есть-ли данные из дочерних форм
//попутно сформируем строку для запроса для формаирования формы
        $change = false;
        $sql = 'UPDATE repair_add SET';
        foreach(self::$arrRepair as $key => $value) {
            if (isset($_POST[$key]) && ($_POST[$key])) {
                self::$arrRepair[$key] = $_POST[$key];
                $change = true;
            }
            if (isset(self::$arrRepair[$key])) {
                $sql = $sql . ' ' . $key . ' = \'' . self::$arrRepair[$key] . '\',';
            }
        }
        $sql = rtrim($sql, ',');
        $sql = $sql . ' WHERE user_id = ' . User::$id . ';';
        //Заносим данные во временную таблица repair_add
        PageDebug::$arrDebug = self::$arrRepair;
        if ($change) {
            DB::query($sql);
        }
*/
        foreach(self::$arrRepair as $key => $value) {
            if (isset($_POST[$key])) {
                self::$arrRepair[$key] = $_POST[$key];
                $_SESSION[$key] = self::$arrRepair[$key];
            } else {
                self::$arrRepair[$key] = $_SESSION[$key];
            }
        }
        
/*        foreach(self::$arrRepair as $key => $value) {
            $_SESSION[$key] = $value;
        }
*/
        //Формируем запрос для добавления ремонта
        if (isset($_POST['button_save'])) {
            foreach(self::$arrRepair as $key => $value) {
                if (isset($_POST[$key])) {
                    self::$arrRepair[$key] = $_POST[$key];
                    $_SESSION[$key] = self::$arrRepair[$key];
                } else {
                    self::$arrRepair[$key] = $_SESSION[$key];
                }
            }
        }

//        PageDebug::$arrDebug = self::$arrButtons;
//        PageDebug::$varTmp = self::$arrButtons['button_locomotive']['click'];
//        PageDebug::$varTmp2 = self::$arrButtons;
    }
    
    static public function show()
    {
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

    static public function buttonClick($button)
    {
/*        if (!isset($_POST['$button'])) {
            
          return 1;
          }*/
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

    static private function _buttonSubdivision()
    {
        IncTpl::show('button_subdivision');
    }

    static private function _buttonLocomotive()
    {
        //   IncTpl::show('button_locomotive');
        
        PageLocomotives::prep();

    }

    static public function repairAddFormHead()
    {
        IncTpl::show('repair_add_form');
    }
}
?>