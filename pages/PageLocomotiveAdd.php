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
      self::$tpl['1']['title'] = 'Наименование машины:';
      self::$tpl['1']['value'] = self::$vars['locomotive_name'];
      self::$tpl['1']['button'] = 'button_locomotive_name';
      self::$tpl['1']['vars']['1'] = 'locomotive_name_id';
      self::$tpl['1']['vars']['2'] = 'locomotive_name';
    }
    static public function prepButtons()
    {
        self::$buttons['button_locomotive_name'] ='PageLocomotiveNames';
    }
    static public function prep()
    {
        AddForm::prep(get_class());
    }

}
?>