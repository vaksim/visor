<?php
class AddForm
{
//    static public $vars = array();
    static public $buttons = array();
    static public $tpl = array();
    static public $className = null;
    static public $page = null;
    static public $buttonName = null; //Имя нажатой кнопки

    static public function prep($className)
    {
        self::$className = $className;
        if (isset($_POST['page'])) {
            self::$page = $_POST['page'];
        }
        $className::prepVars();
//Кнопки
//        PageDebug::$varTmp2 = 'eeeq';
        $className::prepTpl();
        foreach($className::$tpl as $tplKey => $tplObj) { 

            if (isset($tplObj['buttons'])) {
                foreach($tplObj['buttons'] as $buttonNumber => $buttonValue) { 

                    self::$buttons[$buttonValue['name']]['page'] = $buttonValue['page'];
//                    PageDebug::$varTmp2 = $buttonValue;
                    self::$buttons[$buttonValue['name']]['click'] = false;
                }
            }
        }
/*
        $className::prepButtons();
        foreach($className::$buttons as $key => $value) {
            self::$buttons[$key]['page'] = $value;
            self::$buttons[$key]['click'] = false;
        }
*/

        if (isset($_POST['button_new'])) { //В предыдущем сеансе была
                                                  //нажата кнопка Добавить
                                                  //Значить инициализируем переменные
            foreach($className::$vars as $key => $value) {
                $_SESSION[$key] = $value;
            }
        }

        foreach(self::$buttons as $key => $arr) {
            if (isset($_POST[$key])) { //В предыдущем сеансе была нажата кнопка
                self::$buttons[$key]['click'] = true;
                $arr['page']::prep();
            }
        }


        foreach($className::$vars as $key => $value) {
            if (isset($_POST[$key])) {
                $className::$vars[$key] = $_POST[$key];
                $_SESSION[$key] = $className::$vars[$key];
            } else {
                $className::$vars[$key] = $_SESSION[$key];
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
        $className::prepTpl();
        self::$tpl = $className::$tpl;
        PageDebug::$varTmp = self::$buttons;
    }

    static public function show()
    {
        IncTpl::show('add_form', get_class());
//        $divClassPage = null;
        if (isset($_POST['div_class'])) {
            $divClassPage = $_POST['div_class'];
        }
        foreach(self::$buttons as $buttonName => $arr) { //Если в предыдущем сеансе
            if ($arr['click']) {
                self::$buttonName = $buttonName;
                $arr['page']::prep($divClassPage);   //была нажата какая-то кнопка 
                $arr['page']::show();   //показываем страницу
            }
        }

    }

    static public function addFormHead()
    {
        IncTpl::show('add_form_head', get_class());
    }
}
?>