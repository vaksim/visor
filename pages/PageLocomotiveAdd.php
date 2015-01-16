<?php
class PageLocomotiveAdd extends PageAddForm
{
    static public function prepVars()
    {
        self::$vars['locomotive_id'] = null;
        self::$vars['locomotive_name'] = null;
        self::$vars['locomotive_number'] = null;
        self::$vars['locomotive_name_id'] = null;
    }
    static public function prepTpl()
    {
      self::$tpl[1]['title'][1] = 'Наименование машины:';
      self::$tpl[1]['label'][1] = self::$vars['locomotive_name'];

      self::$tpl[1]['buttons'][1]['set']['name'] = 'button_locomotive_name';
      self::$tpl[1]['buttons'][1]['set']['type'] = 'page';
      self::$tpl[1]['buttons'][1]['set']['page'] = 'PageLocomotiveNames';
      self::$tpl[1]['buttons'][1]['vars'][1] = 'locomotive_name_id';
      self::$tpl[1]['buttons'][1]['vars'][2] = 'locomotive_name';

      self::$tpl[2]['title'][1] = 'Номер машины:';
      self::$tpl[2]['label'][1] = self::$vars['locomotive_number'];
      self::$tpl[2]['buttons'][1]['set']['name'] = 'button_locomotive_number';
      self::$tpl[2]['buttons'][1]['set']['type'] = 'text';
      self::$tpl[2]['buttons'][1]['text']['locomotive_number'] = self::$vars['locomotive_number'];
//      self::$tpl[2]['text'][1]['set']['name'] = 'text';
//      self::$tpl[2]['text'][1]['buttons'][1]['set']['name'] = 'get_locomotive_namber';
//      self::$tpl[2]['text'][1]['buttons'][1]['set']['name'] = 'get_locomotive_namber';
//      self::$tpl[2]['text'][1]['buttons'][1]['vars']['name'] = 'get_locomotive_namber';


//['locomotive_number'] = self::$vars['locomotive_number'];

    }
/*    static public function prepButtons()
    {
        self::$buttons['button_locomotive_name'] ='PageLocomotiveNames';
    }
*/
    static public function prep()
    {
        AddForm::prep(get_class());
    }

    static public function echoArr($obj, $gKey = null)
    {
        if ((gettype($obj) === 'array')) {
            if (isset($gKey)) {

                echo '[' . $gKey . '] => ';
                echo 'Array';// . "<br>\n";

            } else {
                echo 'Array';// . "<br>\n";

            }

            foreach ($obj as $key => $value) {
                self::$count= self::$count + 1;
                self::echoCount(self::$count);
                self::echoArr($value, $key);
                self::$count--;
            }
        } else {

//            self::echoCount(self::$count);
            echo '[' . $gKey . '] (' . gettype($gKey) . ') ' . $obj;// . "<br>\n";
//            self::echoCount(self::$count);
//            self::$count--;
        }
    }

    static public $count = 0;
    static public $tmp = array ('name' => 'joe', 'sur' => 'kson');

    static public function echoCount($count)
    {
        echo "<br>\n";

        for ($i = 0; $i < self::$count; $i++) {
            echo '----';
        }
    }
}
?>