<?php
class HtmlBegin
{
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
