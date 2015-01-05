<?php
class PageRepairAdd
{
    static public $clickButtonLocomotive = false;
    static public $arrRepair = array(
        'subdivision_id' => null,
        'subdivision_name' => null,
        'locomotive_id' => null,
        'locomotive_name' => null,
        'locomotive_number' => null
    );
    
    static public $arrTpl = array(
        'Locomotives' => array(
            'title' => 'Машина',
            'but_label' => 'Машины',
            'vars' => array(
                'page' => 'Locomotives',
                'div_class' => 'Page'
            )
        )
    );
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
        if (isset($_POST['button_new_repair'])) {
            DB::query(' DELETE FROM repair_add WHERE user_id = \'' . User::$id . '\';');
        }
        $sql = 'SELECT ';
        foreach(self::$arrRepair as $key => $value) {
            $sql = $sql . ' ' . $key . ',';
        }
        $sql = rtrim($sql, ',');
        $sql = $sql . ' FROM repair_add WHERE user_id = ' . User::$id . ';';

        PageDebug::$varTmp = $sql;
        PageDebug::$varTmp2 = $change;

        DB::query($sql);      
//        DB::query('SELECT * FROM repair_add WHERE user_id = \'' . User::$id . '\';');
        //       self::_dbQuery(); //Делаем запрос к repair_add
        if (@pg_num_rows(DB::getResult()) !== 0) { //Если строчка найдена то заносим данные в массив для шаблона
//            PageDebug::$varTmp = 'Ok';
            while ($row =  @pg_fetch_assoc(DB::getResult())) {
                foreach(self::$arrRepair as $key => $value) {               
                self::$arrRepair[$key] = $row[$key];
                }
                /*
                self::$arrRepair['subdivision_name'] = $row['subdivision_name'];
                self::$arrRepair['locomotive_id'] = $row['locomotive_id'];
                self::$arrRepair['locomotive_name'] = $row['locomotive_name'];
                self::$arrRepair['locomotive_number'] = $row['locomotive_number'];
              */
//            foreach(@pg_fetch_assoc(DB::getResult()) as $key => $value) {
              
            }
            
        } else { //Если записи для текущего пользователя нету, мы ее вставляем

        DB::setQuery('INSERT INTO repair_add (user_id) VALUES (' . User::$id . ');');
        @DB::setResult(pg_query(DB::getQuery()));
        }
//        PageDebug::$arrDebug = @pg_fetch_assoc(DB::getResult());


        
        if (isset($_POST['button_subdivision'])) {
            self::_buttonSubdivision();
        }

        if (isset($_POST['button_locomotive'])) { //В предыдущем сеансе была нажата кнопка выбора машины
//            self::_buttonLocomotive();
            self::$clickButtonLocomotive = true; //Шаблон locomotives будет рисовать кнопки для RepairAdd
            PageLocomotives::prep();
        }
//Проверяем есть-ли данные из дочерних форм
//попутно сформируем строку для запроса для формаирования формы
        $change = false;
        $sql = 'UPDATE repair_add SET';
        foreach(self::$arrRepair as $key => $value) {
            if (isset($_POST[$key]) && ($_POST[$key])) {
                self::$arrRepair[$key] = $_POST[$key];
//                self::$arrRepair[$key] = $value;
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
//        DB::query('UPDATE repair_add SET subdivision_id = \'2\', subdivision_name = \'222\', locomotive_id = 1, locomotive_name = \'' . self::$arrRepair['locomotive_name'] . '\', locomotive_number = \'1111\' WHERE user_id = ' . User::$id . ';');
// . User::$id . ');');
//        DB::setResult(pg_query(DB::getQuery()));


    }
    
    static public function show()
    {
        IncTpl::show('repair_add');
        if (self::$clickButtonLocomotive === true) {
            PageLocomotives::show();
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
}
?>