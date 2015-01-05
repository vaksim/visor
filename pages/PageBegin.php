<?php
class PageBegin
{
    static public $pageTitle = 'Авторизация';
    
    public function __construct()
    {
        //echo '$$$$$$$$$$$$$$$$$$$$$$$$$$$$$';
        //   echo '<h2 align="center">'.'Здравствуйте!<br>Пожалуйста авторизируйтесь<br>'.'</h2>';
    }
    static public function show()
    {
        IncTpl::show('first');
    }
}
?>
