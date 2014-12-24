<?php
class HtmlError
{
    public function __construct()
    {
        //echo '$$$$$$$$$$$$$$$$$$$$$$$$$$$$$';
//        echo '<h2 align="center">'._AUTH_ERROR_TEXT.'</h2>';
    }
    static public function show()
    {
        echo '<h2 align="center">'._AUTH_ERROR_TEXT.'</h2>';
//        IncTpl::show('error');
    }
}
?>
