<?php
class AddForm
{
//    static public $vars = array();
    static public $pageButton = null;
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
//Значить инициализируем переменные 
        if (isset($_POST['button_new'])) {
            foreach($className::$vars as $key => $value) {
                $_SESSION[$key] = $value;
            }
        }
//Проверяем переменные
        foreach($className::$vars as $key => $value) {
            if (isset($_POST[$key])) {
                $className::$vars[$key] = $_POST[$key];
                $_SESSION[$key] = $className::$vars[$key];
            } else {
                $className::$vars[$key] = $_SESSION[$key];
            }
        }
//Готовим шаблон
        $className::prepTpl();
        self::$tpl = $className::$tpl;
        foreach($className::$tpl as $tplNameObj => $tplObj) { 
            if (isset($tplObj['buttons'])) {
                foreach($tplObj['buttons'] as $buttonNumber => $buttonValue) { 
                    if (isset($_POST[$buttonValue['set']['name']])) {
//В предыдущем сеансе была нажата кнопка
                        //self::$tpl[$tplNameObj]['buttons'][$buttonNumber]['set']['click'] = true;
                        
                        if ($buttonValue['set']['type'] === 'page') {
                            self::$pageButton = $buttonValue['set']['page'];
                        } else {
                            self::$pageButton = self::$page;
                        }
                    }
                }
            }
        }
        
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
        PageDebug::$varTmp = self::$tpl;
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
        $page = self::$page;
        $page::prep($divClassPage);   //была нажата какая-то кнопка
//        $page::show();   //показываем страницу
//                }
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
}
?>