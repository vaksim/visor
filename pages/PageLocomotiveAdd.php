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

      self::$tpl[1]['buttons'][1]['name'][] = 'button_locomotive_name';
      self::$tpl[1]['buttons'][1]['type']['page'] = 'PageLocomotiveNames';
      self::$tpl[1]['buttons'][1]['vars'][1] = 'locomotive_name_id';
      self::$tpl[1]['buttons'][1]['vars'][2] = 'locomotive_name';

      self::$tpl[2]['title'][1] = 'Номер машины:';
      self::$tpl[2]['label'][1] = self::$vars['locomotive_number'];
      self::$tpl[2]['buttons'][1]['name'] = 'button_locomotive_number';
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

}
?>