<?php
class PageLocomotiveNameAdd extends PageAddForm
{
    static public $sql = 'INSERT INTO locomotive_names (name) VALUES (\'' . self . '\');';
    static public function prepVars()
    {
        self::$vars['locomotive_name_id'] = null;
        self::$vars['locomotive_name_name'] = null;
    }
    static public function prepTpl()
    {
      self::$tpl[2]['title'][1] = 'Наименование:';
      self::$tpl[2]['label'][1] = self::$vars['locomotive_name_name'];
      self::$tpl[2]['buttons'][1]['set']['name'] = 'button_locomotive_name';
      self::$tpl[2]['buttons'][1]['set']['type'] = 'text';
      self::$tpl[2]['buttons'][1]['text']['locomotive_name_name'] = self::$vars['locomotive_name_name'];
    }
    static public function prep()
    {
        AddForm::prep(get_class());
    }
//static public function
}
?>