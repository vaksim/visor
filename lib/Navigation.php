<?php
class Navigation
{
    static public $data = array();
    static public $idPageData = array(
        'title' => null
    );

    static public $arrNavigation = array(
        'Repairs' => array(
            'but_label' => 'Ремонты',
            'vars' => array(
                'page' => 'PageRepairs'
            )
        ),
        'Locomotives' => array(
            'but_label' => 'Машины',
            'vars' => array(
                'page' => 'PageLocomotives',
                'div_class' => 'Page'
            )
        )
    );
    
    static public function prep($page = null)
    {
        $pageName = array();
        if ((isset($_POST['navigation_clear'])) || (!isset($_SESSION['navigation']))) {
            $_SESSION['navigation'] = array();
        }
/*
        if (isset($page)) {
            if (isset($page::$idPageData)){
                self::$idPageData = $page::$idPageData;
                self::$data = $_SESSION['navigation'];
$dataCurrent 
                if ($page === end(self::$data['']);
                //$dataCurrent = array_pop(self::$data);
                   
                    if ($page === end($_SESSION['navigation'])) {
                        PageDebug::$varTmp = '--------------------';
                        return 0;
                    } else {

                        array_push(self::$data, self::$idPageData);
                    }
                }
            }*/
        }
    

    static public function show()
    { 
        IncTpl::show('navigation', get_class());
        array_push($_SESSION['navigation'], self::$idPageData);
    }
}
?>