<?php
class HtmlRepairAdd
{
    static public $subdivision = '-';
    
    static public function show()
    {
        if (isset($_POST['subdivision'])) {
            self::$subdivision = $_POST['subdivision'];
        }
        IncTpl::show('repair_add');
    }
}

?>