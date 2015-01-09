<?php
class Navigation
{
    static public $arrNavigation = array(
        'Repairs' => array(
            'but_label' => 'Ремонты',
            'vars' => array(
                'page' => 'Repairs'
            )
        ),
        'Locomotives' => array(
            'but_label' => 'Машины',
            'vars' => array(
                'page' => 'Locomotives',
                'div_class' => 'Page'
            )
        )
    );
    
    static public function show()
    { 
        IncTpl::show('navigation');
    }
}
?>