<?php
class AddForm
{
//    static public $vars = array();
    static public $buttonPage = null;
    static public $buttonType = null;
    static public $buttonNameClick = null;
///static public
    static public $tpl = array();
    static public $className = null;
    static public $page = null;
//    static public $buttonName = null; //Имя нажатой кнопки

    static public function prep($className)
    {
        self::$className = $className;
        if (isset($_POST['page'])) {
            self::$page = $_POST['page'];
        }
        $className::prepVars();

//В предыдущем сеансе была нажата кнопка Добавить
//Значить инициализируем переменные в сессии
        if (isset($_POST['button_new'])) {
            $sql = null;
            foreach($className::$vars as $varName => $varData) {
                $_SESSION[$varName] = $varData['value'];
            }
        }
//Если была нажата кнопка сохранить
        if (isset($_POST['button_save'])) {
            $fields = null;
            $values = null;
            $tableName = $className::$tableName;
            foreach($className::$vars as $varName => $varData) {
                $fields = $fields  . $varData['field'] . ', ';
                $values = $values . '\'' . $_SESSION[$varName] . '\', ';
            }
            $fields = rtrim($fields, ', ');
            $values = rtrim($values, ', ');
            $sql = 'INSERT INTO ' . $tableName  . ' (' . $fields . ') VALUES (' . $values . ');';
            DB::query($sql);
            PageDebug::$varTmp = $sql;
//            PageDebug::$varTmp = ;
        }

//Проверяем переменные
        foreach($className::$vars as $varName => $varData) {
            if (isset($_POST[$varName])) {
                $className::$vars[$varName]['value'] = $_POST[$varName];
                $_SESSION[$varName] = $className::$vars[$varName]['value'];
            } else {
                $className::$vars[$varName]['value'] = $_SESSION[$varName];
            }
        }
//Готовим шаблон
        $className::prepTpl();
        self::$tpl = $className::$tpl;
//        foreach($className::$tpl as $tplNameObj => $tplObj) { 
        foreach(self::$tpl as $tplNameObj => $tplObj) {
            if (isset($tplObj['buttons'])) {
                foreach($tplObj['buttons'] as $buttonNumber => $buttonValue) { 
                    echo $buttonNumber;
                    if (isset($_POST[$buttonValue['set']['name']])) {
//В предыдущем сеансе была нажата кнопка


                        //self::$tpl[$tplNameObj]['buttons'][$buttonNumber]['set']['click'] = true;
//                            PageDebug::$varTmp2 = $buttonValue;
                        if ($buttonValue['set']['type'] === 'page') {
//                            PageDebug::$varTmp2 = $buttonValue;
                            self::$buttonPage = $buttonValue['set']['page'];
                        } 
                            self::$buttonType = $buttonValue['set']['type'];
                            self::$buttonNameClick = $buttonValue['set']['name'];
//                            self::$buttonLabel = '<=';

//else {
//                            self::$buttonPage = self::$buttonPage;

                    }
                }
            }
        }
//    }
        
/*        //Формируем запрос для добавления ремонта
          if (isset($_POST['button_save'])) { 
          foreach(self::$className::$vars as $key => $value) {
          if (isset($_POST[$key])) {
          self::$className::$vars[$key] = $_POST[$key];
          $_SESSION[$key] = self::$className::$vars[$key];
          } else {
          self::$className::$vars[$key] = $_SESSION[$key];
          }
          }
          }
*/
//        $className::prepTpl();
//        self::$tpl = $className::$tpl;

//    if (isset(self::$buttonPage)) {
//        PageDebug::$varTmp = self::$page;
//    }
}

    static public function show()
    {
        IncTpl::show('add_form', get_class());
        $divClassPage = null;
        if (isset($_POST['div_class'])) {
            $divClassPage = $_POST['div_class'];
        }
//        foreach(self::$buttons as $buttonName => $arr) { //Если в предыдущем сеансе
//            if ($arr['click']) {
//Если в описании кнопки не указана страница которую она вызвает, тогда просто обновляется форма добавления
//                if (isset($arr['page'])) {
//                    
//                    self::$buttonName = $buttonName;
        if (isset(self::$buttonPage)) {
            $buttonPage = self::$buttonPage;
            $buttonPage::prep($divClassPage);   //была нажата какая-то кнопка
//        PageDebug::$varTmp =$page;
            $buttonPage::show();   //показываем страницу
        }
//            }
//        }

    }

    static public function addFormHead()
    {
        IncTpl::show('add_form_head', get_class());
    }

    static public function showTplObj($tplObjType, $tplObj)
    {
        if (isset($tplObj[$tplObjType])) {
            foreach($tplObj[$tplObjType] as $titleNumber => $titleValue) {
                echo "<td>$titleValue</td>\n";
            }
        } else {
            echo "<td></td>\n";
        }
    }
    static public function separator($type) {
        ;
    }
}
?>