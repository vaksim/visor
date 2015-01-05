<?php
class PageLocomotiveAdd
{
    static public $from = null;
    
    static public $arrLocomotive = array(
        'locomotive' => array(
            'name' => 'Машина',
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
//        self::$from = $from;
    }
    
    static public function show()
    {
        IncTpl::show('locomotive_add');
    }
}
?>